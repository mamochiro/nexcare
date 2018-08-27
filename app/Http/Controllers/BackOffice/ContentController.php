<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;
use Image;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        
    }
    public function index()
    {   
        $data = Content::OrderBy('created_at','desc')->get();
        return view('backoffice.content.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backoffice.content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $image       = $request->file('img');
            $extension = $image->getClientOriginalExtension();
            $filename = str_random(50).time().'.'.$extension;
            $image_resize = Image::make($image->getRealPath());              
            // $image_resize->resize($width, $height);
            $image_resize->save(public_path('uploads/' .$filename));
        }
        $create = New Content;
        $create->fill($data);
        $create->img = $filename;
        $create->save();
        return redirect()->route('content.index')->with('success','Created! Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);
        return view('backoffice.content.edit',compact('content'));
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
        $data = $request->all();
        $content = Content::find($id);
        $content->fill($data);
        if ($request->hasFile('img')) {
            $image       = $request->file('img');
            $extension = $image->getClientOriginalExtension();
            $filename = str_random(50).time().'.'.$extension;
            $image_resize = Image::make($image->getRealPath());              
            // $image_resize->resize($width, $height);
            $image_resize->save(public_path('uploads/' .$filename));
            $content->img =  $filename;
        }
        $content->save();
        return redirect()->route('content.index')->with('success','Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Content::find($id);
        $del->delete();
        return redirect()->route('content.index')->with('success','Deleted Successfully !');
    }
}
