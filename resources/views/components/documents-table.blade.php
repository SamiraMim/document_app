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
            <td>
                @if ($item->flag == 0)
                    انتصاب داده نشده   
                @else
                    انتصاب داده شده
                @endif
            </td>
            <td>
                @if ($item->status == 0)
                    حالت پایه
                @elseif ($item->status == 1)
                    ثبت شده
                @elseif ($item->status == 2)
                    بررسی شده
                @elseif ($item->status == 3)
                    انصراف
                @endif
            </td>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->expired_at }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
            
            @if ($item->user_id != null)
            <td><a target="_blank" href="{{  route('documentView', ['id' =>  $item->id, 'userId' => $item->user_id]) }}" class="btn btn-info">Show</a></td>
                
            @else
            <td><a target="_blank" href="{{  route('documentView', ['id' =>  $item->id, 'userId' => 0]) }}" class="btn btn-info">Show</a></td>
               
            @endif

        </tr>
            
        @endforeach
                           
        
    </tbody>
</table>