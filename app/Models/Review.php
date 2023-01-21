<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_game',
        'score',
        'message',
        'list_type'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_game');
    }
}
