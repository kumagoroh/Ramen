<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books_tb';
    protected $guarded = array('id');

   public static $rules = array(
      'name' => 'required',
      'volume' => 'integer|min:1|max:1000',
      'comment' => 'string|max:1000'
   );

    public function getData()
    {
       return $this->id . ': ' . $this->name . ' ／' . $this->volume . '／ (' . $this->comment . ')';
}
}
