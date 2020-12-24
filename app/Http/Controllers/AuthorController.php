<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors.index_authors', compact('authors'));
    }


    public function create()
    {
        return view('authors.create_authors');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'surname'=> 'required|min:3|max:255',
            'patronymic'=> 'max:255',
        ]);


        $author = new Author([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'patronymic'=>$request->get('patronymic'),
        ]);

        $author->save();
        return redirect('/authors')->with('success', 'Автор успешно добавлен !');
    }

    public function show($id)
    {
        $author = Author::find($id);

        return view('authors.show_authors', compact('author'));
    }


    public function edit($id)
    {
        $author = Author::find($id);

        return view('authors.edit_authors', compact('author'));
    }


    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'surname'=> 'required|min:3|max:255',
            'patronymic'=> 'max:255',
        ]);


        $author = Author::find($id);
        $author->name = $request->get('name');
        $author->surname = $request->get('surname');
        $author->patronymic = $request->get('patronymic');
        $author->save();

        return redirect('/authors')->with('success', 'Автор успешно отредактирован !');
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();

        return redirect('/authors')->with('success', 'Автор успешно удален !');
    }
}
