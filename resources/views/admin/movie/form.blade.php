@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Quản lý thông tin phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if(!isset($movie))
                            {!! Form::open(['route' => 'movie.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['movie.update',$movie->id],'method'=>'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title');!!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ
                            liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']);!!}


                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug');!!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ
                            liệu...','id'=>'convert_slug']);!!}


                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description');!!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ
                            liệu...','id'=>'description']);!!}

                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Active');!!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không'],isset($movie)?$movie->status
                            :'1', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'status']);!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category', 'Category');!!}
                            {!! Form::select('category_id',$category,isset($movie)?$movie->category_id
                            :'', ['class' =>
                            'form-control']);!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Country');!!}
                            {!! Form::select('country_id',$country,isset($movie)?$movie->country_id
                            :'', ['class' =>  'form-control']);!!}

                        </div>
                        <div class="form-group">
                            {!! Form::label('genre', 'Genre');!!}
                            {!! Form::select('genre_id', $genre,isset($movie)?$movie->genre_id
                            :'', ['class' =>    'form-control']);!!}

                        </div>
                        <div class="form-group">
                            {!! Form::label('Image', 'Image');!!}
                            {!! Form::file('image', ['class' =>'form-control-file'])!!}

                        </div>


                        @if(!isset($movie))
                            {!! Form::submit('Thêm dữ liệu',['class'=>'btn btn-primary']); !!}
                        @else
                            {!! Form::submit('Cập nhật',['class'=>'btn btn-info']); !!}
                        @endif
                        {!! Form::close() !!}

                    </div>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề phim</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Mô tả ngắn</th>
                        <th scope="col">Active</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $key => $cate)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $cate->title }}</td>
                            <td>{{ $cate->slug }}</td>
                            <td>{{ $cate->description }}</td>
                            @if ($cate->status)
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
