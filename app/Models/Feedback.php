<?php

// app/Models/Feedback.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Add 'name' and 'email' to the $fillable array
    protected $fillable = ['user_id', 'message', 'name', 'email'];
}
