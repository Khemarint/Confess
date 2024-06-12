<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $brains = $user->brain()->paginate(2);
        return view('users.show',compact('user','brains'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $brains = $user->brain()->paginate(2);
        return view('users.edit',compact('user','editing','brains'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
    }

   public function profile(){
    return $this->show(auth()->user());
   }

}
