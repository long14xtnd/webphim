@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm phim</a>
                <table class="table" id="tablePhim">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề phim</th>
                        <th scope="col">Tên tiếng anh</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Độ phân giải</th>
                        {{--                        <th scope="col">Mô tả ngắn</th>--}}
                        <th scope="col">Active</th>
                        <th scope="col">Category</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Country</th>
                        <th scope="col">Phim hot</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody id="order_position">

                    @foreach($list as $key => $cate)

                        <tr id="{{ $cate->id }}">
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $cate->title }}</td>
                            <td>{{ $cate->eng_name }}</td>
                            <td><img width="70%" src="{{ asset('public/uploads/movie/'.$cate->image) }}"></td>
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
                                @endif
                            </td>



                            {{--                            <td>{{ $cate->description }}</td>--}}
                            @if ($cate->status)
                                <td>Kích hoạt</td>
                            @else
                                <td>Không kích hoạt</td>
                            @endif
                            <td>{{ $cate->category->title }}</td>
                            <td>{{ $cate->genre->title }}</td>
                            <td>{{ $cate->country->title }}</td>
                            @if ($cate->phim_hot)
                                <td>Kích hoạt</td>
                            @else
                                <td>Không kích hoạt</td>
                            @endif
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
