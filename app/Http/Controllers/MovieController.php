<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MovieController extends Controller
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
    public function create()
    {
        //
        $list = Movie::orderBY('id', 'DESC')->get();
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        return view('admin.movie.form', compact('list', 'category', 'country', 'genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        // dd($data);
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
//        $movie->image = $data['image'];

        //them hinh anh
        $get_imgage = $request->file('image');
        $path = 'public/uploads/movie/';

        if ($get_imgage) {
            $get_name_image = $get_imgage->getClientOriginalName(); //hinhanh1.png
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_imgage->getClientOriginalExtension();
            $get_imgage->move($path, $new_image);
            $movie->image = $new_image;


        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
