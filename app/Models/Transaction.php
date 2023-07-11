<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['author', 'posts', 'room'];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
