<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brain extends Model
{
    use HasFactory;

    protected $with = [
        'user:id,name,image',
        'comments.user:id,name,image'
    ];

    protected $table = 'brain';

    protected $fillable = [
        'user_id',
        'content',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class,'brain_like')->withTimestamps();
    }

}
