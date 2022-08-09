<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    use HasFactory;
    protected $table = 'hosting';
    protected $fillable = ['title', 'description', 'price', 'location', 'hosting_type', 'number_of_guest', 'status', 'user_id'];
}
