<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Brain;

class BrainController extends Controller
{

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
        // where id=1
        if(auth()->id() !== $brain->user_id){
            abort(404);
        }

      $brain->delete();

        return redirect()->route('dashboard')->with('success', ' delected successfully !');
    }

    public function edit(Brain $brain){
        if(auth()->id() !== $brain->user_id){
            abort(404);
        }


        $editing = true;
        return view('Confess.show',compact('brain','editing')) ;
    }

    public function update(Brain $brain){

        if(auth()->id() !== $brain->user_id){
            abort(404);
        }


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
