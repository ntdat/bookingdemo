@extends('admin.master')
@section('controller-action','Add Facilities')
@section('content')
    <form action="{!! route('admin.fac.postadd') !!}" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">
            <div class="form-group">
                <label>Title</label>
                <input class="form-control" name="txtTitle" value="{!! old('txtTitle') !!}"
                       placeholder="Please Enter Title "/>
            </div>
            <div class="form-group">
                <label>Icon</label>
                <input class="form-control" name="txtIcon" value="{!! old('Icon') !!}"
                       placeholder="Use font icon instead image thumbnail?"/>
                Example:
                Input "fa-desktop" for <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/"> Fontawesome</a>

            </div>
            <div class="form-group">
                <label>Position</label>
                <input class="form-control" name="txtPosition" value="{!! old('txtPosition') !!}"
                       placeholder="Please Enter Number Position"/>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="txtStatus" <?php if (Input::old('txtStatus') == 1) {
                        echo 'checked="checked"';
                    } ?> value="1" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="txtStatus" value="2" <?php if (Input::old('txtStatus') == 2) {
                        echo 'checked="checked"';
                    } ?>  type="radio">Invisible
                </label>
            </div>
            <button type="submit" class="btn btn-default">Add Facilities</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="imgfac">
            </div>
        </div>
        </form>
            </div>
@endsection