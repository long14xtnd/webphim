<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    use HasFactory;
    //thực hiện kết nỗi giữa bảng movie và bảng category,1 danh mục có nhiều phim và lấy những phim mới nhất
    public function movie()
    {
        return $this->hasMany(Movie::class)->orderBy('id','DESC');
    }


}
