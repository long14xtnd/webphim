@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm phim</a>
                <table class="table" id="tablePhim">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề phim</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Thời lượng phim</th>
                        <th scope="col">Tên tiếng anh</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Độ phân giải</th>
                        <th scope="col">Phụ đề</th>
                        {{--                        <th scope="col">Mô tả ngắn</th>--}}
                        <th scope="col">Active</th>
                        <th scope="col">Category</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Country</th>
                        <th scope="col">Số tập</th>
                        <th scope="col">Phim hot</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col">Năm</th>
                        <th scope="col">Season</th>
                        <th scope="col">Topview</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody id="order_position">

                    @foreach($list as $key => $cate)

                        <tr id="{{ $cate->id }}">
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $cate->title }}</td>
                            <td>
                                @if($cate->tags!=NULL)
                                    {{ substr($cate->tags,0,50) }}...
                                @else
                                    Chưa có từ khóa cho phim
                                @endif
                            </td>
                            <td>{{ $cate->thoiluong }}</td>
                            <td>{{ $cate->eng_name }}</td>
                            <td><img width="40%" src="{{ asset('public/uploads/movie/'.$cate->image) }}"></td>
                            <td>
                                @if ($cate->resolution==0)
                                    HD
                                @elseif($cate->resolution==1)
                                    SD
                                @elseif($cate->resolution==2)
                                    CAM
                                @elseif($cate->resolution==3)
                                    HDCam
                                @elseif($cate->resolution==4)
                                    FullHD
                                @else
                                    Trailer
                                @endif
                            </td>
                            <td>
                                @if ($cate->phude==0)
                                    Vietsub
                                @elseif($cate->phude==1)
                                    Thuyết minh

                                @endif
                            </td>


                            {{--                            <td>{{ $cate->description }}</td>--}}
                            @if ($cate->status)
                                <td>Kích hoạt</td>
                            @else
                                <td>Không kích hoạt</td>
                            @endif
                            <td>{{ $cate->category->title }}</td>
                            <td>
                                @foreach($cate->movie_genre as $gen)
                                    <span class="badge badge-warning">  {{ $gen->title }}</span>

                                @endforeach
                            </td>

                            <td>{{ $cate->country->title }}</td>
                            <td>{{ $cate->sotap }}</td>
                            @if ($cate->phim_hot)
                                <td>Kích hoạt</td>
                            @else
                                <td>Không kích hoạt</td>
                            @endif
                            <td>{{ $cate->ngaytao }}</td>
                            <td>{{ $cate->ngaycapnhat }}</td>
                            <td>{!! Form::selectYear('year',2000,2022,isset($cate->year)?$cate->year:'',['class'=>'select-year','id'=>$cate->id]) !!}</td>
                            <td>{!! Form::selectYear('season',0,20,isset($cate->season)?$cate->season:'',['class'=>'select-season','id'=>$cate->id]) !!}</td>
                            <td>{!! Form::select('topview',['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng'],isset($cate->topview)?$cate->topview:'',['class'=>'select-topview','id'=>$cate->id]) !!}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route'
                                =>['movie.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa")'])
                                !!}
                                {!! Form::submit('Xóa' ,['class'=>'btn btn-danger']) !!}

                                {!! Form::close() !!}
                                <a href="{{ route('movie.edit',$cate->id) }}" class="btn btn-warning">Sửa</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
