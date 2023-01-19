@extends('layout.master')
@section('title','ویرایش هزینه ها')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> ویرایش  هزینه ها </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ویرایش هزینه ها</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ویرایش هزینه ها </h3>
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
        <form action="{{route('costs.update',['cost'=>$cost->id])}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail4">نام کارفرما</label>
                    <select class="form-control" name="employer_id" readonly="">
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">نام پرداخت کننده</label>
                    <select class="form-control" name="payer_id" readonly="">
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">تایید کننده</label>
                    <select class="form-control" name="confirmer_id" readonly="">
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail4">عنوان هزینه</label>
                    <select class="form-control" name="cost_type_id" id="exampleInputEmail4">
                    <option>نوع هزینه را انتخاب کنید:</option>
                    @foreach($cost_types as $cost_type)
                            <option value="{{$cost_type->id}}" @if($cost_type->id===$cost->cost_type_id) selected @endif>{{$cost_type->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail6">مبلغ هزینه</label>
                    <input type="number"  name="amount" class="form-control" id="exampleInputEmail6" value="{{$cost->amount , old('amount')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail7">طریقه پرداخت</label>
                    <select class="form-control"  name="payment_type_id">
                        @foreach($payment_types as $payment_type)
                            <option value="{{$payment_type->id}}" @if($payment_type->id===$cost->paymenttype->id) selected @endif>{{$payment_type->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail5">توضیحات</label>
                    <input type="text"  name="description" class="form-control" id="exampleInputEmail5" value="{{$cost->description , old('description')}}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>

@endsection
