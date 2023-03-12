<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function getData()
    {
       return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
}}
