<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;

class PreferencesController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/preferences",
 *     summary="Set User Preferences",
 *     tags={"Preferences"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"categories", "sources", "authors"},
 *             @OA\Property(property="categories", type="array", @OA\Items(type="string")),
 *             @OA\Property(property="sources", type="array", @OA\Items(type="string")),
 *             @OA\Property(property="authors", type="array", @OA\Items(type="string"))
 *         )
 *     ),
 *     @OA\Response(response=201, description="Preferences stored successfully"),
 *     @OA\Response(response=401, description="Unauthorized")
 * )
 */

    public function store(Request $request)
{
    $request->validate([
        'sources' => 'required|array',
        'categories' => 'required|array',
        'authors' => 'required|array',
    ]);

    $preference = Preference::updateOrCreate(
        ['user_id' => auth()->user()->id],
        [
            'sources' => $request->sources,
            'categories' => $request->categories,
            'authors' => $request->authors,
        ]
    );

    return response()->json([
        'message' => 'Preferences stored successfully',
        'data' => $preference, 
    ], 201);
}


    /**
     * Get user preferences
     */
    public function index()
    {
        $user = Auth::user();
        $preferences = Preference::where('user_id', $user->id)->first();

        return response()->json($preferences);
    }
}
