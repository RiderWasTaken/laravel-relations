<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Author;

class BackofficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('index', compact ('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create');
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
            'title'=> 'required|max:150',
            'subtitle'=> 'required|max:150',
            'description'=> 'required',
            'date'=> 'required'
        ]);

        $data = $request->all();
        $article = new Article();
        $this->ItemFromRequest($article, $request);

        return redirect ()->route('index', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $article = Article::find($id);
        return view ('single', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view ('edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->all();
        $this->ItemFromRequest($article, $request);

        return redirect()->route('index', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        
        return redirect()->route('index');
    }

    private function ItemFromRequest(Article $article, $data)
    {
        $article->title = $data['title'];
        $article->subtitle = $data['subtitle'];
        $article->description = $data['description'];
        $article->date = $data['date'];
        $article->save();
    }
}
