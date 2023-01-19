@extends('layout.master')

@section('title','ویرایش نقش')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> ویرایش نقش  </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="{{route('role.index')}}">لیست نقش ها</a></li>
                    <li class="breadcrumb-item active">ویرایش نقش </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">ویرایش نقش</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('role.update',['role'=>$role->id])}}" method="post">
                @csrf
                <input type="hidden" name="data_type" value="edit">
                <input type="hidden" name="role_id" value="{{$role->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> نام</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{old('name',$role->name)}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">نام نمایشی</label>
                        <input type="text" class="form-control" name="display_name" id="exampleInputPassword1" value="{{old('display_name',$role->display_name)}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">توضیح</label>
                        <textarea  class="form-control" name="description" id="exampleInputPassword1"  >{{old('description',$role->description)}}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
