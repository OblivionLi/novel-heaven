<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Requests\StoreNovel;
use App\Http\Requests\UpdateNovel;
use App\Novel;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $novels = Novel::paginate(10);

        $search = $request->search;

        if ($request->has('_token')) {
            $novels = Novel::searchName($search)->paginate(10);
        }

        return view('novel.novel', compact('novels'));
    }

    public function novelFilter(Request $request)
    {
        $genres = Genre::all();

        /*$fstatus = $request->status;
        $forderBy = $request->order;
        $fgenre = $request->genres;
        $fname = $request->searchF;

        if ($request->has('_token')) {
            $novels = Novel::searchName($fname)->filterStatus($fstatus)->filterOrder($forderBy)->filterGenre($fgenre)->paginate(10);
        } else {
            $novels = Novel::paginate(10);
        }*/

        if ($request->has('status')) $fstatus = $request->status;
        if ($request->has('order')) $forderBy = $request->order;
        if ($request->has('genres')) $fgenre = $request->genres;
        if ($request->has('searchF')) $fname = $request->searchF;

        if ($request->has('_token')) {
            $novels = Novel::searchName($fname)->filterStatus($fstatus)->filterOrder($forderBy)->filterGenre($fgenre)->paginate(10);
        } else {
            $novels = Novel::paginate(10);
        }

        return view('novel.novelFilter', compact('novels', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::all();

        return view('novel.createNovel', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNovel $request)
    {
        $novel = new Novel();

        $novel->name = $request->name;
        $novel->author = $request->author;
        $novel->date_release = $request->date_release;
        $novel->status = $request->status;
        $novel->translator = $request->translator;
        $novel->description = $request->description;
        $novel->cover = $request->file('cover')->store('novelCovers', 'public');

        $user = Auth::user();
        $user->novels()->save($novel);

        $novel->genres()->sync($request->genres, false);

        return redirect('/cms/novels')->with('success', 'Novel added successfully.');
        //return redirect('/news');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Novel $novel
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {
        $novel = Novel::findBySlug($slug);

        $search = $request->search;

        if ($request->has('_token')) {

            $novel = Novel::searchName($search)->firstOrFail();

            //return redirect()->action('NovelController@show', ['slug' => $novel->slug]);
        }

        return view('novel.showNovel', compact('novel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Novel $novel
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $novel = Novel::findBySlug($slug);
        $genres = Genre::all();
        return view('novel.editNovel', compact('novel', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Novel $novel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNovel $request, $slug)
    {
        $novel = Novel::findBySlug($slug);

        $novel->slug = null;
        $novel->name = $request->name;
        $novel->author = $request->author;
        $novel->date_release = $request->date_release;
        $novel->status = $request->status;
        $novel->translator = $request->translator;
        $novel->description = $request->description;
        $checked = $request->genres;

        $file_path = public_path('/storage/' . $novel->cover);


        if (!$request->hasFile('cover')) {
            $request->except(['cover']);
        } else {
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $novel->cover = $request->file('cover')->store('novelCovers', 'public');
        }

        $novel->save();
        $novel->genres()->sync($checked);

        return redirect('/cms/novels')->with('success', 'Novel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Novel $novel
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $novel = Novel::findBySlug($slug);

        $file_path = public_path('/storage/' . $novel->cover);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }

        $novel->chapters()->delete();
        $novel->delete();

        return redirect('/cms/novels')->with('success', 'Novel deleted successfully.');
    }
}
