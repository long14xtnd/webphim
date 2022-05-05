<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Genre;
use DB;

class IndexController extends Controller
{
    //
    public function home()
    {
        // dd(1230);
        $phim_hot = Movie::where('phim_hot', 1)->where('status', 1)->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        //thực hiện truy vấn lấy ra các danh mục ở trạng thái hiển thị,sắp xếp mới nhất kèm theo các phim của danh mục đó
        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();

        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'phim_hot'));
    }

    public function category($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();  //lấy ra phim theo slug
        //lấy ra phim theo danh mục
        $movie = Movie::where('category_id', $cate_slug->id)->paginate(40);
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie'));
    }

    public function country($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Country::where('slug', $slug)->first();  //lấy ra phim theo slug
        //lấy ra phim theo quóc gia
        $movie = Movie::where('country_id', $cate_slug->id)->paginate(40);
//        dd($cate_slug);
        return view('pages.country', compact('category', 'genre', 'country', 'cate_slug', 'movie'));
    }

    public function genre($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Genre::where('slug', $slug)->first();  //lấy ra phim theo slug
        //lấy ra phim theo thể loại
        $movie = Movie::where('genre_id', $cate_slug->id)->paginate(40);
        return view('pages.genre', compact('category', 'genre', 'country', 'cate_slug', 'movie'));
    }

    public function watch()
    {

        return view('pages.watch');
    }

    public function episode()
    {

        return view('pages.episode');
    }

    public function movie($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('category', 'country', 'genre')->where('slug', $slug)->where('status', 1)->first();
        //phim liên quan
        $related_movie = Movie::with('category', 'country', 'genre')->where('category_id',$movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        return view('pages.movie', compact('category', 'genre', 'country', 'movie','related_movie'));
    }
}
