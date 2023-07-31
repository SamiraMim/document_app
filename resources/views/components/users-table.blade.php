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
            <td><a target="_blank" href="{{ route('getUserAssignment', ['userId' =>  $user->id]) }}" class="btn btn-dark">login</a></td>
        </tr>
            
        @endforeach
                        
        
    </tbody>
</table>