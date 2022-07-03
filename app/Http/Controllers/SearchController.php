<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->search) {
            $movies = Film::where('name', 'like', '%' . $request->search . '%')->get();
            if (count($movies) > 0) {
                return response()->json($movies);
            }
        }
    }
}
