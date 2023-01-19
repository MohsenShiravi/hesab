@extends('layout.master')
@section('title','لیست حساب های بانکی')
@section('page-styles')
    <!-- Datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
{{--                <h1 class="m-0 text-dark">لیست حساب های بانکی</h1>--}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">لیست حساب های بانکی</li>
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
                <h3 class="card-title-rtl">لیست حساب های بانکی</h3>
            </div>
            <div class="card-body">
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <table id="bank-accounts-list" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                         <th>ردیف</th>
                         <th>عنوان حساب</th>
                         <th>نام بانک</th>
                         <th>نام شعبه</th>
                         <th>شماره کارت</th>
                         <th>شماره حساب</th>
                         <th>شماره شبا</th>
                         <th>عملیات</th>
                     </tr>
                     </thead>
                    <tbody>
                        @foreach($bank_accounts as $bank_account)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$loop->iteration}}</td>
                                <td>{{$bank_account->title}}</td>
                                <td>{{$bank_account->bank_name}}</td>
                                <td>{{$bank_account->branch_name}}</td>
                                <td>{{$bank_account->card_number}}</td>
                                <td>{{$bank_account->account_number}}</td>
                                <td>{{$bank_account->shaba_number}}</td>
                                <td>
                                    <a href="{{route('bank-accounts.edit',['bank_account'=>$bank_account->id])}}"  class="btn btn-info">ویرایش</a>
                                    <a href="{{route('bank-accounts.destroy',['bank_account'=>$bank_account->id])}}" onclick="return confirm('آیا مطمئن هستید؟') " class="btn btn-danger" >حذف</a>
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
            $("#bank-accounts-list").DataTable({
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
