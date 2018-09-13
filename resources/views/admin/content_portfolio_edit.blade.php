<div class="wrapper container-fluid">
    <form action="{{ route('portfolioEdit',['portfolio'=>$data['id']]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" value="{{$data['id']}}" name="id">
            <label class="col-xs-2 control-label" for="name">Name</label>
            <div class="col-xs-8">
                <input class="form-control" placeholder="Name" type="text" name="name" value="{{$data['name']}}">{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="filter">Filter</label>
            <div class="col-xs-8">
                <input class="form-control" placeholder="Filter" type="text" name="filter" value="{{$data['filter']}}">{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="images">Old_image</label>
            <div class="col-xs-8">
                <img src="{{asset('assets/img/' .$data['images'])}}" class='img-circle img-responsive' width='150px'>
                <input type="hidden" name="old_images" value="{{$data['images']}}">{{--old->session-i mej exac name-n e--}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label" for="images">Image</label>
            <div class="col-xs-8">
                <input class='filestyle' data-buttonText='Choose File' data-buttonName="btn-primary" data-placeholder="No File" type="file" name="images" accept="image/*">{{--old->session-i mej exac name-n e--}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button class='btn btn-primary' type='submit'>Save</button>
            </div>
        </div>


        {{--<input class="input-btn" type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{ csrf_field() }}

    </form>
</div>
