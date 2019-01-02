<?php

namespace App\Http\Controllers;

use App\Link;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::orderBy('created_at', 'desc')->take(4)->get();

        return view('home', compact('links'));
    }
}