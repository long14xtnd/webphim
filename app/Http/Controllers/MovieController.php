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
        $list = Movie::with('category', 'country', 'genre')->orderBY('id', 'DESC')->get();
        return view('admin.movie.index', compact('list', ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $list = Movie::with('category', 'country', 'genre')->orderBY('id', 'DESC')->get();
        $category = Category::pluck('title', 'id'); //lấy ra danh mục phim trong db bao gồm title và id
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        return view('admin.movie.form', compact('category', 'country', 'genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //khu vực lưu thông tin người dùng vừa nhập
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
//        $path = 'public/uploads/movie/';

        if ($get_imgage) {
            $get_name_image = $get_imgage->getClientOriginalName(); //hinhanh1.png
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_imgage->getClientOriginalExtension();
            $get_imgage->move('public/uploads/movie/', $new_image);
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
//        $list = Movie::with('category', 'country', 'genre')->orderBY('id', 'DESC')->get();
        $category = Category::pluck('title', 'id'); //lấy ra danh mục phim trong db bao gồm title và id
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $movie = Movie::find($id);
        return view('admin.movie.form', compact( 'category', 'country', 'genre', 'movie'));
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
        $data = $request->all();
        // dd($data);
        $movie = Movie::find($id);
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
//        $path = 'public/uploads/movie/';

        if ($get_imgage) {
            if (!empty($movie->image)) {
                unlink('public/uploads/movie/' . $movie->image);
            }
            $get_name_image = $get_imgage->getClientOriginalName(); //hinhanh1.png
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_imgage->getClientOriginalExtension();
            $get_imgage->move('public/uploads/movie/', $new_image);
            $movie->image = $new_image;


        }
        $movie->save();
        return redirect()->back();
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
        $movie = Movie::find($id);
        if (!empty($movie->image)) {
            unlink('public/uploads/movie/' . $movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}
