<div style="margin:0px 50px 0px 50px;">
    @if($services)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ </th>
                <th>Name</th>
                <th>Text</th>
                <th>Icon name</th>
                <th>Icon</th>
                <th>Create Date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $k => $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{  $service->text }}</td>
                    <td>{{ $service->icon }}</td>
                    <td> <div class="service_block"> <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $service->icon }}"></i></span> </div> </div></td>
                    <td>{{ $service->created_at }}</td>
                    <td>
                        <form class='form-horizontal' action="{{ route('serviceEdit',['service'=>$service->id]) }}" method="post">
                            {{ method_field('DELETE') }}  {{--<input type="hidden" name="_method" value="delete">--}}
                            <button class='btn btn-danger' type='submit'>Delete</button>
                            {{ csrf_field() }}
                        </form>
                    </td>
                    <td>
                        <form class='form-horizontal' action="{{ route('serviceEdit',['service'=>$service->id]) }}" method="post">
                            <input type="hidden" name="_method" value="edit">
                            <button class='btn btn-success' type='submit'>Edit</button>
                            {{ csrf_field() }}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <a href="{!! route('serviceAdd') !!}">Add New Page</a>
</div>