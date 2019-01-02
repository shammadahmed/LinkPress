<?php

namespace App\Http\Controllers;

use App\Url;
use App\Link;
use App\Keyword;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\LinkRequest;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::paginate(5);

        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $url = new Url($request->input('url'));

        $data = $url->getData();

        $link = Link::create($data);
        if (isset($data['keywords']))
        {
            $keywords = explode(',', $data['keywords']);

            foreach($keywords as $key)
            {
                $keyword = new Keyword;
                $keyword->name = $key;
                $keyword->save();
                $link->keywords()->attach($keyword);
            }
        }


        return redirect($data['hash']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hash)
    {
        $link = Link::where('hash', $hash)->with('keywords')->first();
        if ($link) {
            return view('links.show', compact('link'));
        }

        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hash)
    {
        $link = Link::where('hash', $hash)->delete();

        session()->flash('status', 'The Link was deleted successfully!');

        return back();
    }
}
