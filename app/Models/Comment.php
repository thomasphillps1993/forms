<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'conversation_id', 'user_id'];

    // Define the relationship with the conversation
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
