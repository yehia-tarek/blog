<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        // dd($user);
        return view("admin.profile.profile",compact("user"));
    }

    public function update(Request $request){
        $user = auth()->user();

// dd($request->all());
        if($request->hasFile('image')){
            // dd($request->all());

            if(file_exists((public_path('images/'.$user->image))))
            {
                // File::delete((public_path('images/'.$post->image)));
                Storage::disk('public')->delete(public_path('images/'.$user->image));
            }
            $imageName = $request->image->getClientOriginalName();
            // $request->image->move(public_path('images'), $imageName);
            Storage::disk('public')->put('images/profile',$request->image->getClientOriginalName());
            $user->image = $imageName;
        }
        if (isset($request->name)){
            $user->name = $request->name;
        }
        $user->save();

        return redirect()->back();
    }
}
