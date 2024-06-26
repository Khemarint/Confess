<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function brain(){
        return $this->hasMany(Brain::class)->latest();
    }

    public function comment(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function getImageURL(){
        if($this->image){
            return url('storage/'. $this->image);
        }

        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
    }

    public function followings(){

        return $this->belongsToMany(User::class,'follower_user','follower_id','user_id');

    }

    public function followers(){
        return $this->belongsToMany(User::class,'follower_user','user_id','follower_id');
    }
    public function follows(User $user){
        return $this->followings()->where('user_id',$user->id)->exists();
    }

    public function likings(){
        return $this->belongsToMany(Brain::class,'brain_like')->withTimestamps();
    }

    public function Likes(Brain $brain){
        return $this->likings()->where('brain_id',$brain->id)->exists();
    }


}
