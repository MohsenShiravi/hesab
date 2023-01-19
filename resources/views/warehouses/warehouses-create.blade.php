@extends('layout.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ایجاد انبار</li>
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
            <h3 class="card-title-rtl">ایجاد انبار</h3>
        </div>
        <div class="card-body" dir="rtl">
        <div class="form-group">
            <form role="form" action="{{route('warehouses.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="keeper_id">انباردار</label>
                    <select name="keeper_id" id="keeper_id" class="form-control">
                        <option value="" disabled selected>انباردار خود را انتخاب کنید</option>
                        @foreach($keepers as $keeper)
                            <option value="{{$keeper->id}}" @if(old('keeper_id') == $keeper->id) selected @endif>{{$keeper->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="province_id">استان</label>
                    <select name="province_id" id="province-id" class="form-control">
                        <option value="" disabled selected>استان را انتخاب کنید</option>
                        @foreach($provinces as $province)
                            <option value="{{$province->id}}" @if(old('province_id') == $province->id) selected @endif>{{$province->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="city_id">شهر</label>
                    <select name="city_id" id="city-id" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">آدرس</label>
                    <textarea name="address"  id="description" class="form-control" placeholder="آدرس انبار را وارد نمایید">{{old('address')}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@section('page-scripts')
    <script>
        $(document).ready(function () {
            $('#province-id').on('change', function () {
                var idProvince = this.value;
                $("#city-id").html('');
                $.ajax({
                    url: "{{url('provinces/get-cities')}}",
                    type: "POST",
                    data: {
                        province_id: idProvince,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city-id').html('<option value=""> شهر را انتخاب کنید </option>');
                        $.each(result.cities, function (key, value) {
                            $("#city-id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
