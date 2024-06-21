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
    protected $fillable = ['whodid', 'whoreceive','pass','strength', 'toworkon', 'obs','created_at','updated_at'];
    public function userpublics()
    {
        return $this->belongsTo(UserPublic::class);
    }

}
