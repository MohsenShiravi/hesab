@extends('layout.master')
@section('title','لیست هزینه ها')
@section('page-styles')
    <!-- Datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست هزینه ها</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">لیست هزینه ها</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title-rtl">لیست هزینه ها</h3>
            </div>
            <div class="card-body">
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <table id="costs-list" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                         <th>ردیف</th>
                         <th>عنوان هزینه</th>
                         <th>نام پرداخت کننده</th>
                         <th>نام تایید کننده</th>
                         <th>مبلغ</th>
                         <th>طریقه پرداخت</th>
                         <th>عملیات</th>
                     </tr>
                     </thead>
                    <tbody>
                        @foreach($costs as $cost)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$loop->iteration}}</td>
                                <td>{{$cost->costType? $cost->costType->name : null }}</td>
                                <td>{{$cost->payer->name}}</td>
                                <td>{{$cost->confirmer->name}}</td>
                                <td>{{$cost->amount}}</td>
                                <td>{{$cost->paymentType->title}}</td>
                                <td>
                                    <a href="{{route('costs.edit',['cost'=>$cost->id])}}"  class="btn btn-info">ویرایش</a>
                                    <a href="{{route('costs.destroy',['cost'=>$cost->id])}}" onclick="return confirm('آیا مطمئن هستید؟') " class="btn btn-danger" >حذف</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
    <script src="/assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
            $("#costs-list").DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
