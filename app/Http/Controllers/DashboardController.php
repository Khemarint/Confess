<?php

namespace App\Http\Controllers;
use App\Models\Brain;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $users = [
        //     [
        //         'name' => 'Alex',
        //         'age' => 30,
        //     ],
        //     [
        //         'name' => 'Dan',
        //         'age' => 25
        //     ],
        //     [
        //         'name' => 'John',
        //         'age' => 17,
        //     ]

        // ];

        // return view(
        //     'dashboard',
        //     [
        //         'users' => $users
        //     ]
        // );

            $brains = Brain::orderBy("created_at","desc");

            if(request()->has("search")){
                $brains= $brains->where("content","LIKE","%" . request()->get('search','') . '%');
            }

        // This is record
        return view("dashboard",[
            'brains' => $brains->paginate(2)
        ]);
    }
}
