<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie_Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;


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
        $list = Movie::with('category', 'country', 'genre','movie_genre')->orderBY('id', 'DESC')->get();
//        return response()->json($list);
        $list_genre = Genre::all();

//        dd($list_genre);
        $path = public_path() . "/json/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true); //tức là nếu ko có đường dẫn trong thư mục thì nó sẽ tạo ra cho chúng ta và cấp quyền truy cập vào trong file json 0777 là toàn quyền thêm sửa xóa

        }
        File::put($path . 'movies.json', json_encode($list));
        return view('admin.movie.index', compact('list', 'list_genre'));
    }

    public function getMovieTrailer(Request $request)
    {
        $key = $request->keys;
        $movie_trailer = Movie::where('resolution', $key)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take(10)->get();
        return $movie_trailer;
    }

    public function searchMovie(Request $request)
    {
        $key = $request->key;
        $movies = Movie::where('title', 'like', '%' . $key . '%')->get();

        return $movies;
    }

    public function update_year_phim(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }

    public function update_season(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }

    public function update_topview_phim(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
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
        $list_genre = Genre::all();
        return view('admin.movie.form', compact('category', 'country', 'genre', 'list_genre'));
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
        $movie->topview = $data['topview'];
        $movie->tags = $data['tags'];
        $movie->trailer = $data['trailer'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->sotap = $data['sotap'];
        $movie->eng_name = $data['eng_name'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
//        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id = $gen[0];
        }
//        $movie->year = $data['year'];
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
        $movie->movie_genre()->attach($data['genre']);
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
        $list_genre = Genre::all();
        $movie_genre = $movie->movie_genre;
        return view('admin.movie.form', compact('category', 'country', 'genre', 'movie', 'list_genre','movie_genre'));
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
//        return response()->json($data['genre']);
        // dd($data);
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->topview = $data['topview'];
        $movie->tags = $data['tags'];
        $movie->trailer = $data['trailer'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->sotap = $data['sotap'];
        $movie->eng_name = $data['eng_name'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
//        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $movie->phim_hot = $data['phim_hot'];

        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
//        $movie->image = $data['image'];


        //them hinh anh
        $get_imgage = $request->file('image');
//        $path = 'public/uploads/movie/';

        if ($get_imgage) {

            if (file_exists('public/uploads/movie' . $movie->image)) {
                unlink('public/uploads/movie' . $movie->image);
            }
            $get_name_image = $get_imgage->getClientOriginalName(); //hinhanh1.png
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_imgage->getClientOriginalExtension();
            $get_imgage->move('public/uploads/movie/', $new_image);
            $movie->image = $new_image;


        }
        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id = $gen[0];
        }
        $movie->save();
        $movie->movie_genre()->sync($data['genre']);
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
        $movie = Movie::find($id);
        $movie->delete();

        $movieId = $movie->id;

        if (file_exists('public/uploads/movie' . $movie->image)) {
            unlink('public/uploads/movie' . $movie->image);
        }

        //xoa the loai
        Movie_Genre::where('movie_id', '=', $movieId)->delete();

        return redirect()->back();
    }
}
