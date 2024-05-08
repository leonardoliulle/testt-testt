<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesttModel extends Model
{
    use HasFactory;
    protected $table = 'testt';

    protected $fillable = ['msg', 'pass','ip'];

}
