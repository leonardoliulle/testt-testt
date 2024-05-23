<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'assessments';
    protected $fillable = ['whodid', 'whoreceive', 'strength', 'toworkon', 'obs'];
    public function userpublics()
    {
        return $this->belongsTo(UserPublic::class);
    }

}
