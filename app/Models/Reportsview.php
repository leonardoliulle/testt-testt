<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportsview extends Model
{
    protected $table = 'reportsviews';
    protected $fillable = ['httplink', 'name', 'description', 'alias', 'pass','group'];
}