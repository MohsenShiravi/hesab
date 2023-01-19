@extends('layout.master')
@section('title','افزودن نوع هزینه')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> افزودن نوع هزینه </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">افزودن نوع هزینه</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">افزودن نوع هزینه</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{route('cost-types.store')}}" method="post">
            @csrf
            <input type="hidden" name="data_type" value="create">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان هزینه</label>
                    <input type="text"  name="title" class="form-control" id="exampleInputEmail1" value="{{old('title')}}" placeholder="نام هزینه را وارد نمایید.">
                </div>
{{--                @if($user->hasRole(['super_admin']))--}}
                <div class="form-group">
                    <div class="form-check">
                        <input type="radio" id="customRadio1" name="cost_type" class="form-check-input"  value="general" >
                        <label class="form-check-label"for="customRadio1"> هزینه های عمومی</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="customRadio2" name="cost_type" class="form-check-input"  value="private" checked>
                        <label class="form-check-label" for="customRadio2" > هزینه های شخصی</label>
                    </div>
                </div>
{{--                @endif--}}
            <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>
</div>
@endsection
