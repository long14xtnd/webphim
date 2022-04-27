@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {!! Form::open(['route' => 'category.store','method'=>'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title');!!}
                        {!! Form::text('title', null, ['class' => 'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'title']);!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description');!!}
                        {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'description']);!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('active', 'Active');!!}
                        {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không'],null, ['class' => 'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'status']);!!}
                    </div>
                    {!! Form::submit('Thêm dữ liệu',['class'=>'btn btn-primary']); !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection