@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý thể loại phim</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    @if(!isset($genre))
                    {!! Form::open(['route' => 'genre.store','method'=>'POST']) !!}
                    @else
                    {!! Form::open(['route' => ['genre.update',$genre->id],'method'=>'PUT']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('title', 'Title');!!}
                        {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' =>
                        'form-control','placeholder'=>'Nhập vào dữ
                        liệu...','id'=>'title']);!!}


                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description');!!}
                        {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['class' =>
                        'form-control','placeholder'=>'Nhập vào dữ
                        liệu...','id'=>'description']);!!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('active', 'Active');!!}
                        {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không'],isset($genre)?$genre->status :'', ['class' =>
                        'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'status']);!!}
                    </div>
                    @if(!isset($genre))
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
                        <td>{{ $cate->description }}</td>
                        @if ($cate->status)
                        <td>Kích hoạt</td>
                        @else
                        <td>Không kích hoạt</td>
                        @endif

                        <td>
                            {!! Form::open(['method' => 'DELETE','route'
                            =>['genre.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa")'])
                            !!}
                            {!! Form::submit('Xóa' ,['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                            <a href="{{ route('genre.edit',$cate->id) }}" class="btn btn-warning">Sửa</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection