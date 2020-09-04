<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use App\Comment;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $name = Auth::user()->name;
        alert()->success("Bienvenue à vous <strong class='text-success pl-2'>$name</strong>");
        return view('home');
    }


    public function comment($documentKey, Request $request) 
    {
        $hash = new Hashids('',6);
        $id = $hash->decode($documentKey)[0];
        /**Validation step */
        $validator = Validator::make($request->all(), [
            'content' => ['required','max:100','min:2'],
        ]);
        
        if ($validator->fails()) {
            return back()->withError($validator->errors()->all()[0])->withInput();
        }
        $comment = new Comment();
        $comment->document = $id;
        $comment->comment = $request->content;
        $comment->author = Auth::id();
        $comment->save();

        return back()->withSuccess('Vous venez de commenter ce document');
    }
}
