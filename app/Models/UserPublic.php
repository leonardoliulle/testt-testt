<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPublic extends Model
{
    use HasFactory;

    protected $table = 'user_public'; // Specify the custom table name here

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

}
