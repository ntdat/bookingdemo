@extends('admin.master')
@section('controller-action','Edit Car')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label>Categories Parent</label>
                <select class="form-control" name="txtParent">
                    <option value="">Please Choose Categorie</option>
                    <?php cate_parent($cate,0,'--',$des->cate_id) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! $des->name !!}"
                       placeholder="Please Enter Name Car"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="txtDes">{!! $des->des !!}</textarea>
                <script type="text/javascript">ckeditor('txtDes');</script>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="rdoStatus" <?php if ($des->status == 1) {
                        echo 'checked="checked"';
                    } ?> value="1" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" <?php if ($des->status == 2) {
                        echo 'checked="checked"';
                    } ?>  type="radio">Invisible
                </label>
            </div>
            <div class="form-group">
                <label>Show at Index</label>
                <label class="radio-inline">
                    <input name="txtTop" <?php if ($des['showatindex'] == 1) {
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
                <input type="file" name="desimgs[]" multiple="true">
            </div>
            <?php $images = json_decode($des->images);$numberimg=0;

            ?>
            @if(!isset($images))
                {!! "Not have Main Images, Please Choose Image To Upload !!!" !!}
            @endif
            @foreach($images as $key => $image)
                <?php $numberimg++;
                ?>
                <span class="delimg{!! $key !!}">
                          <img id="img{!! $key !!}" style="margin-bottom:10px" width="300" height="180" src="{!! asset("resources/upload/imagedes/$image") !!}"/>
                          <a href="Javascript:void(0)" id="id{!! $key !!}" data-key="{!! $key !!}" data-id="{!! $des->id !!}" class="btn btn-danger btn-circle icon_del "><i class="fa fa-times"></i> </a>
                    </span>
            @endforeach
            <input type="hidden" data-numberimg="{!! $numberimg !!}" id="inforimg" name="inforimg" value=""/>
            <input type="hidden" id="inforimg" name="numberimg" value="{!! $numberimg !!}"/>
        </div>
        </div>
    </form>
    </div>
@endsection