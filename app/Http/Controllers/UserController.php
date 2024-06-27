<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    use AuthorizesRequests;

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
        $this->authorize('update', $user);

        $editing = true;
        $brains = $user->brain()->paginate(2);
        return view('users.edit',compact('user','editing','brains'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,User $user)
    {
        $this->authorize('update', $user);
        
        $validated = $request->validated();

            if(request()->has('image')){
                $imagePath = request()->file('image')->store('profile','public');
                $validated['image'] = $imagePath;
                Storage::disk('public')->delete($user->image);
            }

            $user->update($validated);

            return redirect()->route('profile');

    }

   public function profile(){
    return $this->show(auth()->user());
   }

}
