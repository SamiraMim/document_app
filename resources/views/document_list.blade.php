@extends('main')
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
    <div class="row justify-content-center">
        <div class="col-lg-10 list">
            <table class="table table-striped table-center mb-0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>firstName</th>
                    <th>lastName</th>
                    <th>Email</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>action</th>
                    <th>user_panel</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><a href=" {{ route('assignDocument', ['userId' =>  $user->id]) }}" class="btn btn-info">assign</a></td>
                        <td><a target="_blank" href="#" class="btn btn-dark">login</a></td>
                    </tr>
                        
                    @endforeach
                                    
                    
                </tbody>
            </table>
        </div>
    </div>
    <hr />
    <a href="{{ route('clearAssignments') }}" class="btn btn-danger mx-4">Clear Assignments</a>
    <a href="{{ route('checkExpiration') }}" class="btn btn-warning mx-4">Check Expiration</a>
    <div class="row justify-content-center">
        <div class="col-lg-10 list">
            <table class="table table-striped table-center mb-0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>priority</th>
                    <th>flag</th>
                    <th>status</th>
                    <th>userId</th>
                    <th>expired_at</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->priority }}</td>
                        <td>{{ $item->flag }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->user_id }}</td>
                        <td>{{ $item->expired_at }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td><a target="_blank" href="{{ route('documentView', ['id' =>  $item->id])}}" class="btn btn-info">Show</a></td>
                    </tr>
                        
                    @endforeach
                                       
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection