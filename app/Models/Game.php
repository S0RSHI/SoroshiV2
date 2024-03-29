<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_release',
        'image',
        'description',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_game');
    }

    protected $dates = ['date_release'];
}
