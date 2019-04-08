<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name','description','price','total_in_shelf','total_in_vault','store_id'];
    public $timestamps = false;

    public function store()
    {
      return $this->belongsTo(Store::class);
    }
}
