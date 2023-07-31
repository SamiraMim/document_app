@extends('layout.main')
@section('style')
    <style>
        .list {
        margin: 40px auto;
        text-align: center;
        border: 2px solid gray;
        padding: 10px;
    }
    </style>
@endsection
@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-lg-10 my-3">
            <h1>Admin Home Page</h1>
        </div>
    </div>
    <hr />
    <div class="row justify-content-center text-center">
        <h3 class="text-info">List of Users</h3>
        <div class="col-lg-10 list">
            <x-users-table :users="$users" />
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col">
            <h3 class="text-info">List of Documents</h3>
            <hr />
            <a href="{{ route('clearAssignments') }}" class="btn btn-danger mx-4">Clear Assignments</a>
            <a href="{{ route('checkExpiration') }}" class="btn btn-warning mx-4">Check Expiration</a>
            <a target="_blank" href="{{ route('getAssignedDocuments') }}" class="btn btn-success mx-4">list of assigned documents</a>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col-lg-10 list">
            <x-documents-table :documents="$documents" />
        </div>
    </div>
@endsection