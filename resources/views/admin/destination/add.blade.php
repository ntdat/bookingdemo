@extends('admin.master')
@section('controller-action','Add Tour')
@section('content')
    <form action="{!! route('admin.destination.postadd') !!}" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">

            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="txtParent">
                    <option value="">Please Choose Category</option>
                    <?php  cate_parent($cate, 0, "--", old('txtParent')) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! old('txtName') !!}"
                       placeholder="Please Enter Tour Name"/>
            </div>
            <div class="form-group">
                <label>Description </label>
                <textarea class="form-control" rows="3" name="txtDes">{!! old('txtDes') !!}</textarea>
                <script type="text/javascript">ckeditor('txtDes');</script>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="rdoStatus" <?php if (Input::old('rdoStatus') == 1) {
                        echo 'checked="checked"';
                    } ?> value="1" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" <?php if (Input::old('rdoStatus') == 2) {
                        echo 'checked="checked"';
                    } ?>  type="radio">Invisible
                </label>
                <div class="form-group">
                    <label>Show At</label>
                    <label class="radio-inline">
                        <input name="txtTop" <?php if (Input::old('txtTop') !="") {
                            echo 'checked="checked"';
                        } ?> value="1" type="checkbox">Index
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </div>

        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Images Can Choose Multiple File</label>
                <input type="file" name="desimgs[]" multiple="true">
            </div>

        </div>
        </form>
@endsection