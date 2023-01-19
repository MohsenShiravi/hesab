@extends('layout.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ایجاد کاربر</li>
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
            <h3 class="card-title-rtl">ایجاد کاربر</h3>
        </div>
        <div class="card-body" dir="rtl">
            <div class="form-group">
                <form role="form" action="{{route('users.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="method_type" value="store">
                    <div class="form-group">
                        <label for="name">نام</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">ایمیل</label>
                        <input type="email" name="name" value="{{old('email')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mobile">موبایل</label>
                        <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control">
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

