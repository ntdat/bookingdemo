@extends('admin.master')
@section('controller-action','Add Car')
@section('content')
    <form action="{!! route('admin.car.postadd') !!}" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">
            <div class="form-group">

                <label>Tour Parent</label>
                <select class="form-control" name="txtTour">
                    <?php
                    foreach($tour as $key =>$val){
                        echo "<option value ='$key'>-- $val</option>";
                    }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! old('txtName') !!}"
                       placeholder="Please Enter Name Car"/>
            </div>
            <div class="form-group">
                <label>Quality Room</label>
                <select name="txtQuality" class="form-control">
                    <option value="">Please Select Quality</option>
                    @for($i=0;$i<=50;$i++)
                        @if (Input::old('txtQuality') == $i)
                            {!! "<option value='$i' selected>$i</option>" !!}
                        @else
                            {!! "<option value='$i'>$i</option>" !!}
                        @endif
                    @endfor
                </select>

            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" value="{!! old('txtPrice') !!}"
                placeholder="Please Enter Number Room"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="txtDes">{!! old('txtDes') !!}</textarea>
                <script type="text/javascript">ckeditor('txtDes');</script>
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
            <div class="form-group">
                <label>Show At Index</label>
                <label class="radio-inline">
                    <input name="txtTop" <?php if (Input::old('txtTop') !="") {
                        echo 'checked="checked"';
                    } ?> value="1" type="checkbox">
                </label>

            </div>
            <button type="submit" class="btn btn-default">Add Car</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </div>

        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="form-group col-md-10">
                <label>Image Car ( Multiple Upload )</label>
                <input type="file" name="imgcar[]" multiple="true">
            </div>
        </div>
        </form>
            </div>
@endsection