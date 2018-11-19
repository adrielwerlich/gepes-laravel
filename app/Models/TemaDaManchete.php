<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TemaDaManchete extends Model
{
    protected $table = 'tema_da_manchete';

    public function manchetes()
    {
        return $this->hasMany(Manchete::class);
    }
}
