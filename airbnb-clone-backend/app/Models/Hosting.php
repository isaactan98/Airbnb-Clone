<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    use HasFactory;
    protected $table = 'hosting';
    protected $fillable = ['title', 'description', 'price', 'location', 'hosting_type', 'status'];
}
