<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\Models\Member;
use Exception;
use Session;
use Toastr;
class MemberController extends Controller
{
    public function store(Request $request)
    {
        //return $request->all();
        $comment = Comment::create([
            'user_id' =>  auth::user()->id,
            'body' => $request->input('body'),
            'commentable_type' => $request->input('commentable_type'),
            'commentable_id' => $request->input('commentable_id'),
            // Add other necessary fields
        ]);

        return response()->json(['comment' => $comment]);
    }

    public function storeReply(Request $request)
    {
        $reply = Comment::create([
            'user_id' =>  auth::user()->id,
            'parent_id' => $request->input('parent_id'),
            'body' => $request->input('body'),
            'commentable_type' => 'App\Post', // Change this to match your Post model namespace
            'commentable_id' => $request->input('commentable_id'),
            // Add other necessary fields
        ]);

        return response()->json(['reply' => $reply]);
    }

    public function loginredirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function logincallback($provider)
    {
    return $provider;
        try {
      
            $user = Socialite::driver($provider)->user();
            $finduser = Member::where('provider_id', $user->id)->first();
            return $user;
            if($finduser){
                Auth::guard('member')->login($finduser);
                return redirect()->route('post.details',Session::get('slug'));
            }else{
                $newUser = Member::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider' => $provider,
                    'provider_id'=> $user->id,
                    'image'=> $user->avatar,
                    'password' => encrypt($user->email)
                ]);

                Auth::guard('member')->login($finduser);
                return redirect()->route('post.details',Session::get('slug'));
            }
      
        } catch (Exception $e) {
            dd($e);
            Toastr::error('Login failed for wrong attemp');
           return redirect()->route('post.details',Session::get('slug'));
        }
    }
}
