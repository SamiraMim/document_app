@extends('main')
@section('style')
    <style>
        .content {
            margin: 40px auto;
            text-align: center;
            border: 2px solid gray;
            padding: 10px;
        }
        .content button {
            padding: 10px 20px;
            margin: 20px;
        }
    </style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-8 content">
        <h1>Document</h1>
        <p>{{ $document}}</p>
        <button class="btn btn-danger">انصراف</button>
        <button class="btn btn-dark">بررسی</button>
        <button class="btn btn-dark">ثبت</button>
    </div>
</div>
@endsection