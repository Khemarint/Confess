<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Brain;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Brain $brain){
        $liker = auth()->user();

        $liker->likings()->attach($brain);

        return redirect()->route('dashboard')->with(
            'success',
            "Liked successfully!"
        );
    }

    public function unlike(Brain $brain){

        $liker = auth()->user();

        $liker->likings()->detach($brain);

        return redirect()->route('dashboard')->with(
            'success',
            "UnLiked successfully!"
        );
    }
}
