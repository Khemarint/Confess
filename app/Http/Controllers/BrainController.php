<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\models\Brain;

class BrainController extends Controller
{
    use AuthorizesRequests;

    public function show(Brain $brain){

        return view("Confess.show",compact('brain') );
    }


    public function store()
    {

        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:240'
            ]
        );

        $validated['user_id'] = auth()->id();

        Brain::create($validated);

        return redirect()->route('dashboard')->with('success', ' created successfully !');
    }
    public function destroy(Brain $brain){
       $this->authorize('delete', $brain);

      $brain->delete();

        return redirect()->route('dashboard')->with('success', ' delected successfully !');
    }

    public function edit(Brain $brain){
        $this->authorize('update', $brain);

        $editing = true;
        return view('Confess.show',compact('brain','editing')) ;
    }

    public function update(Brain $brain){

        $this->authorize('update', $brain);



        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:240'
            ]
        );

        // dd(request()->all());

        $brain->update($validated);

        return redirect()->route('brain.show',$brain->id)->with('success','Updated successfully!');
    }
}
