<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\models\Brain;
use App\Models\User;

class BrainController extends Controller
{
    use AuthorizesRequests;

    public function show(Brain $brain){

        return view("Confess.show",compact('brain') );
    }


    public function store(CreateIdeaRequest $request)
    {

        $validated = $request->validated();

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

    public function update(UpdateIdeaRequest $request,Brain $brain){

        $this->authorize('update', $brain);

        $validated = $request->validated();
        // dd(request()->all());

        $brain->update($validated);

        return redirect()->route('brain.show',$brain->id)->with('success','Updated successfully!');
    }
}
