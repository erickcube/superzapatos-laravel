<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name','address'];
    public $timestamps = false;

    public function articles()
    {
      return $this->hasMany(Article::class);
    }
}
