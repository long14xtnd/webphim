@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Quản lý thông tin phim</div>
                    <a href="{{ route('movie.index') }}" class="btn btn-primary">Liệt kê phim</a>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if(!isset($movie))
                            {!! Form::open(['route' => 'movie.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['movie.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title');!!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ
                            liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']);!!}


                        </div>
                        <div class="form-group">
                            {!! Form::label('trailer', 'Trailer');!!}
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ
                            liệu...']);!!}


                        </div>
                        <div class="form-group">
                            {!! Form::label('tags', 'Tag');!!}
                            {!! Form::text('tags', isset($movie) ? $movie->tags : '', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ
                            liệu...']);!!}


                        </div>
                            <div class="form-group">
                                {!! Form::label('sotap', 'Số tập');!!}
                                {!! Form::text('sotap', isset($movie) ? $movie->sotap : '', ['class' =>
                                'form-control','placeholder'=>'Nhập vào dữ
                                liệu...']);!!}


                            </div>
                        <div class="form-group">
                            {!! Form::label('thoiluong', 'Thời lượng phim');!!}
                            {!! Form::text('thoiluong', isset($movie) ? $movie->thoiluong : '', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ
                            liệu...','id'=>'thoiluong']);!!}


                        </div>
                        <div class="form-group">
                            {!! Form::label('Tên tiếng anh', 'Tên tiếng anh');!!}
                            {!! Form::text('eng_name', isset($movie) ? $movie->eng_name : '', ['class' =>
                            'form-control','placeholder'=>'Nhập vào dữ
                            liệu...']);!!}


                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Định dạng');!!}
                            {!! Form::select('resolution', ['0'=>'HD','1'=>'SD','2'=>'CAM','3'=>'HDCam','4'=>'FullHD','5'=>'Trailer'],isset($movie)?$movie->resolution
                            :'1', ['class' =>
                            'form-control','id'=>'resolution']);!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phude', 'Phụ đề');!!}
                            {!! Form::select('phude', ['0'=>'Việt Sub','1'=>'Thuyết minh'],isset($movie)?$movie->phude
                            :'1', ['class' =>
                            'form-control','id'=>'phude']);!!}
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
                            'form-control','id'=>'status']);!!}
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
                            {!! Form::label('Genre', 'Thể loại', []) !!}<br>
                            {{-- {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '', ['class'=>'form-control']) !!} --}}
                            @foreach($list_genre as $key => $gen)
                                @if(isset($movie))
                                    {!! Form::checkbox('genre[]',$gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false)  !!}
                                @else
                                    {!! Form::checkbox('genre[]',$gen->id, '')  !!}
                                @endif
                                {!! Form::label('genre', $gen->title) !!}
                            @endforeach
                        </div>
                        <div class="form-group">
                            {!! Form::label('phim_hot', 'Phim Hot');!!}
                            {!! Form::select('phim_hot', ['1'=>'Hiển thị','0'=>'Không'],isset($movie)?$movie->phim_hot
                            :'1', ['class' =>
                            'form-control','id'=>'phim_hot']);!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('topview', 'Topview');!!}
                            {!! Form::select('topview', ['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng'],isset($movie)?$movie->topview
                            :'1', ['class' =>
                            'form-control','id'=>'topview']);!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image', 'Image');!!}
                            {!! Form::file('image', ['class' =>'form-control-file'])!!}

                            @if(isset($movie))
                                <img width="40%" src="{{ asset('public/uploads/movie/'.$movie->image) }}">
                            @endif

                        </div>


                        @if(!isset($movie))
                            {!! Form::submit('Thêm dữ liệu',['class'=>'btn btn-primary']); !!}
                        @else
                            {!! Form::submit('Cập nhật',['class'=>'btn btn-info']); !!}
                        @endif
                        {!! Form::close() !!}

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
