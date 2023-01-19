@extends('layout.master')
@section('title','افزودن هزینه جدید')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> افزودن هزینه جدید </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">افزودن هزینه جدید</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">افزودن هزینه جدید</h3>
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
        <form action="{{route('costs.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">نام کارفرما</label>
                    <select class="form-control" name="employer_id" readonly="">
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    </select>
{{--                    <input type="text"  name="employer_id" class="form-control" id="exampleInputEmail1" value="{{old('employer_id')}}" placeholder="نام کارفرما را وارد نمایید.">--}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">پرداخت کننده</label>
                    <select class="form-control" name="payer_id" readonly="">
                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    </select>
{{--                    <input type="text"  name="payer_id" class="form-control" id="exampleInputEmail1" value="{{old('payer_id')}}" placeholder="نام پرداخت کننده را وارد نمایید.">--}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تایید کننده</label>
                    <select class="form-control" name="confirmer_id" readonly="">
                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    </select>
{{--                    <input type="text"  name="cost_accountant_id" class="form-control" id="exampleInputEmail1" value="{{old('cost_accountant_id')}}" placeholder="نام تایید کننده را وارد نمایید.">--}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان هزینه</label>
                    <select class="form-control"  name="cost_type_id">
                    <option>نوع هزینه را انتخاب کنید:</option>
                    @foreach($cost_types as $cost_type)
                        <option value="{{$cost_type->id}}">{{$cost_type->name}}</option>
                    @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مبلغ هزینه</label>
                    <input type="number"  name="amount" class="form-control" id="exampleInputEmail1" value="{{old('amount')}}" placeholder="مبلغ هزینه را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">طریقه پرداخت</label>
                    <select class="form-control"  name="payment_type_id">
                        <option>طریقه پرداخت را انتخاب کنید:</option>
                        @foreach($payment_types as $payment_type)
                            <option value="{{$payment_type->id}}">{{$payment_type->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">توضیحات</label>
                    <input type="text"  name="description" class="form-control" id="exampleInputEmail1" value="{{old('description')}}" placeholder="توضیحات را وارد نمایید.">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>
</div>
@endsection
