
<div style="margin:0px 50px 0px 50px;">

    @if($pages)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ </th>
                <th>Name</th>
                <th>Alias</th>
                <th>Text</th>
                <th>Create Date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pages as $k => $page)

                <tr>
                    {{--<a  href="{{route('portfolio')}}">--}}
                        {{--<h5>Portfolio</h5>--}}
                    {{--</a>--}}
                    <td>{{ $page->id }}</td>
                    {{--<td><a type="button" href="{!! route('pagesEdit',['page'=>$page->id, 'alt'=>$page->name]) !!}">{{$page->name}}</a></td>--}}
                    <td>{{ $page->alias }}</td>
                    <td>{{  $page->text }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>
                        <form class='form-horizontal' action="{{ route('pagesEdit',['page'=>$page->id]) }}" method="post">
                            {{ method_field('DELETE') }}  {{--<input type="hidden" name="_method" value="delete">--}}
                            <button class='btn btn-danger' type='submit'>Delete</button>
                            {{ csrf_field() }}
                        </form>
                        {{--{!! Form::open(['url'=>route('pagesDestroy',['page'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}--}}
                        {{--{!! Form::hidden('_method', 'delete') !!}--}}
                        {{--{!! Form::button('Delete',['class'=>'btn btn-danger', 'type'=>'submit']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                    </td>
                    <td>
                        <form class='form-horizontal' action="{{ route('pagesEdit',['page'=>$page->id]) }}" method="post">
                            <input type="hidden" name="_method" value="edit">
                            <button class='btn btn-success' type='submit'>Edit</button>
                            {{ csrf_field() }}
                        </form>
                        {{--{!! Form::open(['url'=>route('pagesDestroy',['page'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}--}}
                        {{--{!! Form::hidden('_method', 'delete') !!}--}}
                        {{--{!! Form::button('Delete',['class'=>'btn btn-danger', 'type'=>'submit']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                    </td>

                </tr>

            @endforeach


            </tbody>
        </table>
    @endif
        <a href="{!! route('pagesAdd') !!}">Add New Page</a>
    {{--{!! Html::link(route('pagesAdd'),'New Page') !!}--}}

</div>