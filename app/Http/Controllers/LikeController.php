<?php

namespace App\Http\Controllers;

use App\Likeable;
use App\News;
use Auth;
use Illuminate\Http\Request;
use Session;

class LikeController extends Controller
{
    public function likeNews(Request $request)
    {
        //$news = News::findBySlug($slug);

        $this->handleLike(News::class, $request->id);
        //return response()->json(['status' => 'success', 'message' => 'you like this']);
        return redirect()->back();


    }

    public function handleLike($type, $id)
    {
        $existing_like = Likeable::whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (Auth::user()) {
            if (is_null($existing_like)) {
                Likeable::create([
                    'user_id' => Auth::id(),
                    'likeable_id' => $id,
                    'likeable_type' => $type
                ]);
            } else {
                $existing_like->delete();
            }
        }
    }

}
