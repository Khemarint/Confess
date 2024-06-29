<?php

namespace App\Http\Controllers;
use App\Models\Brain;
use Illuminate\Http\Request;
use App\Models\User;
class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $followingIDs = $user->followings()->pluck('user_id');

        $brains = Brain::whereIn('user_id',$followingIDs)->latest();

        if (request()->has("search")) {
            $brains = $brains->search(request('search',''));
        }

        // This is record
        return view("dashboard", [
            'brains' => $brains->paginate(2)
        ]);
    }
}
