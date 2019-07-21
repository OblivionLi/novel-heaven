<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNews;
use App\Likeable;
use App\News;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $news = DB::table('news')->paginate(4);
        $news = News::paginate(4);

        return view('news.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.createNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNews $request)
    {
        $news = new News();

        $news->title = $request->title;
        $news->article = $request->article;

        $user = Auth::user();
        $user->news()->save($news);

        return redirect('/news')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::findBySlug($slug);
        $like = Likeable::where('user_id', Auth::user()->id)->first();

        return view('news.showNews', compact('news', 'like'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $news = News::findBySlug($slug);

        return view('news.editNews', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $news = News::findBySlug($slug);

        $news->slug = null;

        $news->title = $request->title;
        $news->article = $request->article;

        $news->save();

        return redirect('/news')->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $news = News::findBySlug($slug);

        $news->delete();

        return redirect('/news')->with('success', 'News deleted successfully.');
    }
}
