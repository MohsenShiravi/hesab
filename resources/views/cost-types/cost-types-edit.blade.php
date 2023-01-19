@extends('layout.master')
@section('title','ویرایش نوع هزینه')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> ویرایش نوع هزینه </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ویرایش نوع هزینه</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ویرایش نوع هزینه </h3>
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
        <form action="{{route('cost-types.update',['cost_type'=>$cost_type->id])}}" method="post">
            @csrf
            <input type="hidden" name="data_type" value="edit">
            <input type="hidden" name="cost_type_id" value="{{$cost_type->id}}">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان هزینه</label>
                    <input type="text"  name="title" class="form-control" id="exampleInputEmail1" value="{{$cost_type->name,old('title')}}">
                </div>
{{--                @if($user->hasRole(['super_admin']))--}}
                <div class="form-group">
                    <div class="form-check">
                        <input type="radio" id="customRadio1" name="cost_type" class="form-check-input"  value="general" @if($cost_type->user_id===null) checked  @endif>
                        <label class="form-check-label" for="customRadio1"> هزینه های عمومی</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="customRadio2" name="cost_type" class="form-check-input"  value="private" @if($cost_type->user_id!==null) checked @endif>
                        <label class="form-check-label" for="customRadio2" > هزینه های شخصی</label>
                    </div>
                </div>
{{--                @endif--}}
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>

@endsection
