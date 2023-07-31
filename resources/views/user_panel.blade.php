@extends('layout.main')
@section('style')
    <style>
        .list {
        margin: 40px auto;
        text-align: center;
        /* border: 2px solid gray; */
        padding: 10px;
    }

    </style>
@endsection

@section('content')
<div class="row justify-content-center text-center mt-5">
    <div class="col-lg-10">
        <h1>User Panel</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-10 list">
        <x-documents-table :documents="$documents" />
    </div>
</div>
@endsection