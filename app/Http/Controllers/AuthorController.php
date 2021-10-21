<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors= Author::all();
        return view("author.index", ["authors" =>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books = $author->authorBooks;

        //objektu masyvas / kolekcija(collection) - filtruojam masyva

        $books_count = $books->count();
        return view("author.show", ["author"=>$author, "books" =>$books, "books_count" =>$books_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author, Request $request)
    {
        //kaip patikrinti ar autorius turi knygu ir neleisti jo istrinti?
        //jei negalima trinti, parodytu alerta;

        //sesija - cookie
        //destroy - jinai sugeneruoja pranesima(istryne sekmingai ar ne)
        //sesija - globalus kintamasis, sukuriamas narsykleje
        //i sesija mes galime irasyti bet kokio tipo kintamaji

        $books_count = $author->authorBooks->count();
        if($books_count!==0) {
            // $request->session()->put("alert", "Author deleted secsesfully");
            return redirect()->route("author.index")->with('error_message','Author cannot be deleted because author has books.');
        }
        $author->delete();
        return redirect()->route("author.index")->with('sucess_message','Author deleted secsesfully');
    }
}
