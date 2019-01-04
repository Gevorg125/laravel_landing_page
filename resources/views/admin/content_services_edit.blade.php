<div class="wrapper container-fluid">
    <form action="{{ route('serviceEdit',['service'=>$data['id']]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" value="{{$data['id']}}" name="id">
            <label class="col-xs-2 control-label" for="name">Name</label>
            <div class="col-xs-8">
                <input class="form-control" placeholder="Name" type="text" name="name" value="{{$data['name']}}">{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="text">Text</label>
            <div class="col-xs-8">
                <textarea id="editor" class="form-control" placeholder="Text" name="text">{{$data['text']}}</textarea>{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="icon">Icon</label>
            <div class="col-xs-8">

                <input class="form-control" placeholder="Icon" type="text" name="icon" value="{{$data['icon']}}">{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="icon">Icon</label>
            <div class="col-xs-8">
                <div class="service_block"> <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $data['icon'] }}"></i></span></div>
                </div>
            </div>
        </div>
         <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button class='btn btn-primary' type='submit'>Save</button>
            </div>
        </div>

        //token for the form
        {{--<input class="input-btn" type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{ csrf_field() }}

    </form>
</div>
<script>
    CKEDITOR.replace('editor');
</script>