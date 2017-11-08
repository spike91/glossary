<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

class ActorController extends Controller
{
   
	
	public function addActor(Request $request) {
        //return $request->all();
        $this->validate($request,[
            'lastname'=>'required | min:2',
            'firstname'=>'required'
        ]);
        $actor=new Actor;
        $actor->lastname=$request->lastname;
        $actor->firstname=$request->firstname;
        $actor->save();
		return back();
	}

   public function editActor(Actor $actor) {
		return view('pages.actoredit', compact('actor'));
	}

    public function updateActor(Request $request, Actor $actor) {
        $actor->lastname=$request->lastname;
        $actor->firstname=$request->firstname;
        $actor->update();
		return redirect('actors');
	} 

     public function deleteActor(Actor $actor) {
        $actor->delete();
		return redirect('actors');
	} 

}
