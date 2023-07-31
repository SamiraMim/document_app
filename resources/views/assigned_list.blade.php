@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 list">
        <x-documents-table :documents="$documents" />
    </div>
</div>
@endsection