<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;

class ProfileController extends Controller
{
   public function index()
   {
   
    return view('Profile.index');
   }


    public function Userupdate(Request $request)
    {









            $id            = Auth::user()->id;
            $name          = $request->name;
            $email         = $request->email;
            $phone         = $request->phone;
            $profession    = $request->profession;
            $dob           = $request->dob;
            $address       = $request->address;
           

          
           

        $update = [

            'id'           => $id,
            'name'         => $name,
            'email'        => $email,
            'phone'        => $phone,
            'profession'   => $profession,
            'dob'          => $dob,
            'address'      => $address, 
        
      
          
                       
        ];  

            
            User::where('id', Auth::user()->id)->update($update);

        return redirect()->back()->with('success','You have successfully updated your profile info');
    }


    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', $user)->get();
        return view('Profile.show')->withUser($user);
    }


}
