<?php
/**
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Samples\AppEngine\Laravel;

use Google\Cloud\TestUtils\AppEngineDeploymentTrait;
use Google\Cloud\TestUtils\TestTrait;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/DeployLaravelTrait.php';

/**
 * @group deploy
 */
class DeployDatabaseTest extends TestCase
{
    use TestTrait;
    use DeployLaravelTrait;
    use AppEngineDeploymentTrait;

    public static function beforeDeploy()
    {
        // ensure logging output is displayed in phpunit
        self::$logger = new \Monolog\Logger('phpunit');

        $connection = self::requireEnv('LARAVEL_CLOUDSQL_CONNECTION_NAME');
        $dbName = self::requireEnv('LARAVEL_DB_DATABASE');
        $dbUser = self::requireEnv('LARAVEL_DB_USERNAME');
        $dbPass = self::requireEnv('LARAVEL_DB_PASSWORD');

        // Create the laravel project in a temporary directory
        $tmpDir = self::createLaravelProject();

        // copy and set the proper env vars in app.yaml
        $appYaml = str_replace([
            'YOUR_CLOUDSQL_CONNECTION_NAME',
            'YOUR_DB_DATABASE',
            'YOUR_DB_USERNAME',
            'YOUR_DB_PASSWORD',
        ], [
            $connection,
            $dbName,
            $dbUser,
            $dbPass,
        ], file_get_contents(__DIR__ . '/../app-dbsessions.yaml'));
        file_put_contents($tmpDir . '/app.yaml', $appYaml);

        self::addAppKeyToAppYaml($tmpDir);

        // self::execute('php artisan session:table');
        // self::execute('php artisan migrate --force');
    }

    public function testHomepage()
    {
        $this->markTestSkipped(
            'This sample is BROKEN. See https://github.com/GoogleCloudPlatform/php-docs-samples/issues/1349'
        );

        // Access the blog top page
        $resp = $this->client->get('/');
        $this->assertEquals(
            '200',
            $resp->getStatusCode(),
            'top page status code'
        );
        $content = $resp->getBody()->getContents();
        $this->assertStringContainsString('Laravel', $content);
    }
}