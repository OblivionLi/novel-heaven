<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Http\Requests\StoreChapter;
use App\Novel;
use Auth;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $novel = Novel::findBySlug($slug);

        return view('chapter.createChapter', compact('novel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChapter $request, $slug)
    {
        $novel = Novel::findBySlug($slug);
        $user_id = Auth::user();


        if (Auth::check()) {
//            Chapter::create([
//                'user_id' => $user_id->id,
//                'novel_id' => $novel->id,
//                'chapter_name' => $request->chapter_name,
//                'chapter_content' => $request->chapter_content,
//            ]);

            $chapter = new Chapter();

            $chapter->user_id = $user_id->id;
            $chapter->novel_id = $novel->id;
            $chapter->chapter_name = $request->chapter_name;
            $chapter->chapter_content = $request->chapter_content;

            $chapter->save();

        }

        return redirect('/cms/novels')->with('success', 'Chapter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Novel $novel, Request $request, $slug)
    {
        $chapter = Chapter::findBySlug($slug);

        $search = $request->search;

        if ($request->has('_token')) {
            $novel = Novel::searchName($search)->firstOrFail();

            if (!$novel) {
                return redirect()->back()->with('success', 'Novel not found');
            }
            //return redirect()->action('NovelController@show', ['slug' => $novel->slug]);
        }

        $previousChapter = Chapter::findPrevious($chapter->id, $chapter->novel_id);
        $nextChapter = Chapter::findNext($chapter->id, $chapter->novel_id);

        return view('chapter.showChapter', compact('chapter', 'novel', 'nextChapter', 'previousChapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Novel $novel, $slug)
    {
        $chapter = Chapter::findBySlug($slug);

        return view('chapter.editChapter', compact('chapter', 'novel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Novel $novel, $slug)
    {
        $chapter = Chapter::findBySlug($slug);

        if (Auth::check()) {
            $chapter->slug = null;
            $chapter->chapter_name = $request->chapter_name;
            $chapter->chapter_content = $request->chapter_content;

            $chapter->save();

        }
        return redirect('/cms/novels/')->with('success', 'Chapter has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Novel $novel, $slug)
    {
        $chapter = Chapter::findBySlug($slug);

        if (Auth::check()) {
            $chapter->delete();
        }

        return redirect('/cms/novels/')->with('success', 'Chapter has been deleted.');
    }
}
