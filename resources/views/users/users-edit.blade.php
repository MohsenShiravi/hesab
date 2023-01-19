@extends('layout.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ویرایش کاربر</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title-rtl">ویرایش کاربر</h3>
        </div>
        <div class="card-body" dir="rtl">
            <div class="form-group">
                <form role="form" action="{{route('users.update',$user)}}" method="post">
                    @csrf
                    <input type="hidden"  name="method_type" value="update">
                    <input type="hidden"  name="user_id" value="{{$user->id}}">
                    <div class="form-group">
                        <label for="name">نام</label>
                        <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input type="email" name="email" value="{{old('email',$user->email)}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mobile">موبایل</label>
                        <input type="text" name="mobile" value="{{old('mobile',$user->mobile)}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">رمزعبور</label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
