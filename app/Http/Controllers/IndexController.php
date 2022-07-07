<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Movie_Genre;
use App\Http\Controllers\Input;
use DB;

class IndexController extends Controller
{
    //Tìm kiếm phim
    public function timkiem()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take(30)->get();
            $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take(10)->get();


            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('ngaycapnhat', 'DESC')->paginate(40);

            return view('pages.timkiem', compact('category', 'genre', 'country', 'search', 'movie', 'phimhot_sidebar', 'movie_trailer','search'));

        } else {
            return redirect()->to('/');
        }


    }

    public function home()
    {
        // dd(1230);
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $phim_hot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        //thực hiện truy vấn lấy ra các danh mục ở trạng thái hiển thị,sắp xếp mới nhất kèm theo các phim của danh mục đó
        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();
//        dd($phim_hot);
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'phim_hot', 'phimhot_sidebar', 'movie_trailer'));
    }

    public function category($slug)
    {
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();  //lấy ra phim theo slug
        //lấy ra phim theo danh mục
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'movie_trailer'));
    }

    public function country($slug)
    {
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Country::where('slug', $slug)->first();  //lấy ra phim theo slug
        //lấy ra phim theo quóc gia
        $movie = Movie::where('country_id', $cate_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
//        dd($cate_slug);
        return view('pages.country', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'movie_trailer'));
    }

    public function genre($slug)
    {
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Genre::where('slug', $slug)->first();  //lấy ra phim theo slug
        //lấy ra phim theo thể loại
//        $movie = Movie::where('genre_id', $cate_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        //phim nhieu the loai
        $movie_genre = Movie_Genre::where('genre_id',$cate_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $key=>$movi){
            $many_genre[]=$movi->movie_id;
        }
//        return response()->json($many_genre);
        $movie = Movie::whereIn('id', $many_genre)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.genre', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'movie_trailer'));
    }

    public function watch()
    {

        return view('pages.watch');
    }

    public function episode()
    {

        return view('pages.episode');
    }

    public function movie($slug, $id)
    {
//        $phimhot_sidebar=ovie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('30')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('category', 'country', 'genre','movie_genre')->where('id', $id)->where('status', 1)->first();
//        $movie->title = 'long';
//        $movie->save();
        //phim liên quan
        $related_movie = Movie::with('category', 'country', 'genre')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();

        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'related_movie'));
    }

    public function year($year)
    {
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $year = $year;
        //lấy ra phim theo danh mục
        $movie = Movie::where('year', $year)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'phimhot_sidebar', 'movie_trailer'));
    }

    public function tag($tag)
    {
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $tag = $tag;
        //lấy ra phim theo danh mục
        $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.tag', compact('category', 'genre', 'country', 'tag', 'movie', 'phimhot_sidebar', 'movie_trailer'));
    }
}
