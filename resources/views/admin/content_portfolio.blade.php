<div style="margin:0px 50px 0px 50px;">
    @if($portfolios)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ </th>
                <th>Name</th>
                <th>Filter</th>
                <th>Image</th>
                <th>Create Date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($portfolios as $k => $portfolio)
                <tr>
                    <td>{{ $portfolio->id }}</td>
                    <td>{{ $portfolio->name }}</td>
                    <td>{{  $portfolio->filter }}</td>
                    <td><img src="{{asset('assets/img/' .$portfolio->images)}}"  width='50px'></td>
                    <td>{{ $portfolio->created_at }}</td>
                    <td>
                        <form class='form-horizontal' action="{{ route('portfolioEdit',['portfolio'=>$portfolio->id]) }}" method="post">
                            {{ method_field('DELETE') }}  {{--<input type="hidden" name="_method" value="delete">--}}
                            <button class='btn btn-danger' type='submit'>Delete</button>
                            {{ csrf_field() }}
                        </form>
                    </td>
                    <td>
                        <form class='form-horizontal' action="{{ route('portfolioEdit',['portfolio'=>$portfolio->id]) }}" method="post">
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
    <a href="{!! route('portfolioAdd') !!}">Add New Page</a>
</div>