<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{

    /**
 * @OA\Get(
 *     path="/api/articles",
 *     summary="Get Articles List",
 *     tags={"Articles"},
 *     @OA\Response(
 *         response=200,
 *         description="Articles list fetched successfully"
 *     ),
 *     @OA\Response(response=400, description="Invalid Request")
 * )
 */

    public function index(Request $request)
{
    $cacheKey = 'articles_' . $request->getQueryString();

    return Cache::remember($cacheKey, 3600, function () use ($request) {
        $query = Article::query();

        if ($request->has('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        return $query->paginate(10);
    });
}


    public function personalizedFeed()
{
    $user = auth()->user();

    $categories = json_decode($user->preferences->categories ?? '[]');
    $sources = json_decode($user->preferences->sources ?? '[]');

    $query = Article::query();

    if (!empty($categories)) {
        $query->whereIn('source', $categories);
    }

    if (!empty($sources)) {
        $query->whereIn('source', $sources);
    }

    return $query->paginate(10);
}

}
