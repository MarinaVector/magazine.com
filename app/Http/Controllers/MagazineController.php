<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use App\Magazine;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = Magazine::all();


        return view('magazines.index_magazines', compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all()->pluck('name', 'id')->toArray();
        return view('magazines.create_magazines', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'description'=> 'required|max:255',
            'image'=> 'required|image',
            'create_date'=> 'required',
            'author'=> 'required',
        ]);

        $folder = date('Y-m-d');
        $image=$request->file('image')->store("images/{$folder}");

        $magazine = new Magazine([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'image' => $image,
            'create_date'=> $request->get('create_date'),
            'author' => $request->get('author'),
        ]);
//dd($request);
        $magazine->authors()->attach($request->input('author_id'));
        $magazine->save();


        return redirect('/magazines')->with('success', 'Журнал успешно добавлен!');
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
    public function destroy($id)
    {
        //
    }
}
