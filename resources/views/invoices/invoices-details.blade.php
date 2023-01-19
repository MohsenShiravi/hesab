@extends('layout.master')

@section('page-styles')
    <style>body {
            direction: rtl;
        }
        h2 {
            color: green;
            text-align: center;
            letter-spacing: -2px;
        }
        span{
            color: #0c525d;
        }
        .listItemClass {
            color: #858585;
            font-size: 21px;
            padding: 0;
            width: 500px;
        }
        .listItemClass li {
            list-style: none;
            border-bottom: 2px dotted #cecece;
            text-indent: 20px;
            height: auto;
            padding: 10px;
        }
        .listItemClass li:hover {
            background-color: #dedede;
        }
    </style>
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">جزئیات سفارش ها</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <body>
    <br />
    <ul class="listItemClass">
        <li><span>یادداشت شخصی :</span> {{$invoice->personal_note}}</li>
        <li><span>یادداشت برای خریدار :</span> {{$invoice->description}}</li>
        <li><span>بارکد سفارش :</span> {{$invoice->post_barcode}}</li>
        <li><span>هزینه پست :</span> {{number_format($invoice->post_price)}}</li>
        <li><span>هزینه حمل و نقل :</span> {{number_format($invoice->total_shipping)}}</li>
        <li><span>میزان مالیات :</span> {{number_format($invoice->total_tax)}}</li>
        <li><span>تخفیف :</span> {{number_format($invoice->discount_id)}}</li>
        <li><span>میزان تخفیف دلخواه :</span> {{number_format($invoice->discount_amount)}}</li>
    </ul>
    </body>
@endsection
