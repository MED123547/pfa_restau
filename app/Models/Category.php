<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //proteger les champs bd
    protected $guarded = [];

    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
