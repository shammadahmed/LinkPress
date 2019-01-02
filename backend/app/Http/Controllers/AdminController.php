<?php

namespace App\Http\Controllers;

use App\App;
use App\Link;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\AppRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex()
    {
        $user = auth()->user();

        return view('admin.index');
    }

    public function postIndex(AppRequest $request)
    {
        $app = App::first()->toArray();
        $app = App::where('name', $app['name'])->update($request->except('_token'));

        session()->flash('status', 'Your settings are successfully updated!');

        return back();
    }

    public function getUser()
    {
        $user = auth()->user();

        return view('admin.user', compact('user'));
    }

    public function postUser(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->withInput();
        }

        $request->offsetSet('password', bcrypt($request->input('password')));

        User::where('email', $request->get('email'))->update($request->except('_token', 'password_confirmation'));

        session()->flash('status', 'Your settings are successfully updated!');

        return back();
    }

    public function getlinks()
    {
        $links = Link::paginate(10);

        return view('admin.links', compact('links'));
    }
}
