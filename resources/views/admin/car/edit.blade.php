@extends('admin.master')
@section('controller-action','Edit Car')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">

                <label>Hotel Parent</label>
                <select class="form-control" name="txtTour">
                    <?php
                        foreach($tour as $key =>$val){
                            if($key == $car->tour_id){
                                echo "<option value ='$key' selected >-- $val</option>";
                            }else{
                                echo "<option value ='$key'  >-- $val</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! $car->name !!}"
                       placeholder="Please Enter Name Car"/>
            </div>
            <div class="form-group">
                <label>Quality Room</label>
                <select name="txtQuality" class="form-control">
                    <option value="">Please Select Quality</option>
                    @for($i=0;$i<=50;$i++)
                        @if ($car->quality == $i)
                            {!! "<option value='$i' selected>$i</option>" !!}
                        @else
                            {!! "<option value='$i'>$i</option>" !!}
                        @endif
                    @endfor
                </select>

            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" value="{!! $car->price !!}"
                       placeholder="Please Enter Number Room"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="txtDes">{!! $car->des !!}</textarea>
                <script type="text/javascript">ckeditor('txtDes');</script>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="txtStatus" <?php if ($car->status == 1) {
                        echo 'checked="checked"';
                    } ?> value="1" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="txtStatus" value="2" <?php if ($car->status == 2) {
                        echo 'checked="checked"';
                    } ?>  type="radio">Invisible
                </label>
            </div>
            <div class="form-group">
                <label>Show at Index</label>
                <label class="radio-inline">
                    <input name="txtTop" <?php if ($car['showatindex'] == 1) {
                        echo 'checked="checked"';
                    } ?> value="1" type="checkbox">
                </label>

            </div>
            <button type="submit" class="btn btn-default">Edit Car</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </div>

        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="form-group col-md-10">
                <label>Image Car ( Multiple Upload )</label>
                <input type="file" name="imgcar[]" multiple="true">
            </div>
            <?php $images = json_decode($car->images);$numberimg=0;

            ?>
            @if(!isset($images))
                {!! "Not have Main Images, Please Choose Image To Upload !!!" !!}
            @endif
            @foreach($images as $key => $image)
                <?php $numberimg++;
                    ?>
                    <span class="delimg{!! $key !!}">
                          <img id="img{!! $key !!}" style="margin-bottom:10px" width="300" height="180" src="{!! asset("resources/upload/imagecar/$image") !!}"/>
                          <a href="Javascript:void(0)" id="id{!! $key !!}" data-key="{!! $key !!}" data-id="{!! $car->id !!}" class="btn btn-danger btn-circle icon_del "><i class="fa fa-times"></i> </a>
                    </span>
            @endforeach
            <input type="hidden" data-numberimg="{!! $numberimg !!}" id="inforimg" name="inforimg" value=""/>
            <input type="hidden" id="inforimg" name="numberimg" value="{!! $numberimg !!}"/>
        </div>
        </div>
    </form>
    </div>
@endsection