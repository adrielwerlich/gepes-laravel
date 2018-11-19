<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Manchete extends Model
{
 
  protected $table = 'manchetes';
  
  public function temaDaManchete()
    {
        // return $this->hasOne(Location::class);
        return $this->belongsTo(TemaDaManchete::class);
    }
}
