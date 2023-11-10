<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'body', 'description', 'category_id', 'excerpt', 'slug'];

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
