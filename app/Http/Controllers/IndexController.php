<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Genre;

class IndexController extends Controller
{
    //
    public function home()
    {
        // dd(1230);
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        //thực hiện truy vấn lấy ra các danh mục ở trạng thái hiển thị,sắp xếp mới nhất kèm theo các phim của danh mục đó
        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();

        return view('pages.home', compact('category', 'genre', 'country','category_home'));
    }

    public function category($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();  //lấy ra phim theo slug
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug'));
    }

    public function country($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Country::where('slug', $slug)->first();  //lấy ra phim theo slug
//        dd($cate_slug);
        return view('pages.country', compact('category', 'genre', 'country', 'cate_slug'));
    }

    public function genre($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Genre::where('slug', $slug)->first();  //lấy ra phim theo slug
        return view('pages.genre', compact('category', 'genre', 'country', 'cate_slug'));
    }

    public function watch()
    {

        return view('pages.watch');
    }

    public function episode()
    {

        return view('pages.episode');
    }

    public function movie()
    {

        return view('pages.movie');
    }
}
