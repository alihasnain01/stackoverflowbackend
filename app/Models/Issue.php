<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'topic_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function solutions(){
        return $this->hasMany(Solution::class);
    }
}
