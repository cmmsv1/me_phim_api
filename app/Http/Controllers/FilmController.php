<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Episode;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        foreach ($films as $film) {
            $episode = Episode::where('film_id', $film->id)->get();
            $category = Category::where('id', $film->category_id)->first();
            $film->setAttribute('episode', $episode);
            $film->setAttribute('category', $category);
        }

        return response()->json($films);
    }
    public function getFilmByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $films = Film::where('category_id', $category->id)->paginate(20);
            if (count($films) > 0) {
                foreach ($films as $film) {
                    $episode = Episode::where('film_id', $film->id)->get();
                    $category = Category::where('id', $film->category_id)->first();

                    $film->setAttribute('episode', $episode);

                    if ($category) {
                        $film->setAttribute('category', $category);
                    }
                }
                return response()->json($films);
            }
        }
    }
    public function getNewMovie()
    {
        $movies = Film::orderBy('updated_at', 'DESC')->take(10)->get();
        if (count($movies) > 0) {
            return response()->json($movies);
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
