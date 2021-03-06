<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Base as Base;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
            ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('search') != '') {
            $search = $request->input('search');

            $bases = Base::where('title', 'like', '%'.$search.'%')->orderBy('view_count', 'desc')->paginate(15);

            return view('bases.index', ['bases' => $bases]);
        } else {
            $bases = DB::table('bases')->orderBy('view_count', 'desc')->paginate(15);

            return view('bases.index', ['bases' => $bases]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:25',
            'shortdescription' => 'required|string|max:140',
            'description' => 'max:300',
            'imageurl' => 'url',
            'pastebin' => 'url',
            ]);

        $base = new Base;
        $base->title = $request->title;
        $base->user_id = Auth::user()->id;
        $base->shortdescription = $request->shortdescription;
        $base->description = $request->description;
        if ($request->imageurl != '') {
            $base->imageurl = $request->imageurl;
        }
        $base->pastebin = $request->pastebin;
        $base->save();

        return redirect()->route('bases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('bases.listing', ['base' => Base::findOrFail($id)]);
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
        $this->validate($request, [
            'title' => 'required|string|max:25',
            'shortdescription' => 'required|string|max:140',
            'description' => 'max:300',
            'imageurl' => 'required|url',
            ]);

        $base = Base::find($id);
        $base->title = $request->title;
        $base->shortdescription = $request->shortdescription;
        $base->description = $request->description;
        $base->imageurl = $request->imageurl;
        $base->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Base::destroy($id);

        return redirect()->route('bases.index');
    }
}
