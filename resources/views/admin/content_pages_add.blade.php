<div class="wrapper container-fluid">
    <form action="{{ route('pagesAdd') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-xs-2 control-label" for="name">Name</label>
            <div class="col-xs-8">
                <input class="form-control" placeholder="Name" type="text" name="name" value="{{old('name')}}">{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="alias">Alias</label>
            <div class="col-xs-8">
                <input class="form-control" placeholder="Alias" type="text" name="alias" value="{{old('alias')}}">{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="text">Text</label>
            <div class="col-xs-8">
                <textarea id="editor" class="form-control" placeholder="Text" name="text">{{old('alias')}}</textarea>{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="images">Image</label>
            <div class="col-xs-8">
                <input class = 'filestyle' data-buttonText='Choose File' data-buttonName="btn-primary" data-placeholder="No File" type="file" name="images" accept="image/*">{{--old->session-i mej exac name-n e--}}
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