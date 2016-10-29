@extends('admin.master')
@section('controller-action','Edit Tour')
@section('content')
<style>
    .icon_del{
        position: relative;
        top:-110px;
        right: -300px;
    }
</style>
  <form action="" method="post" name="frmedithotel" enctype="multipart/form-data">
      <div class="col-lg-7" style="padding-bottom:120px">
          @include('admin.block.error')
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="hdid" value="{!! $tour->id !!}">
          <input type="hidden" id="inforimg" name="inforimg" value=""/>
          <div class="form-group">
              <label>Category Parent</label>
              <select class="form-control" name="txtParent">
                  <option value="">Please Choose Category</option>
                  <?php  cate_parent( $cate,0,"--",$tour->cate_id) ?>
              </select>
          </div>
          <div class="form-group">
              <label>Name</label>
              <input class="form-control" name="txtName" value="{!! $tour->name !!}"
                     placeholder="Please Enter Tour Name"/>
          </div>
          <div class="form-group">
              <label>Location</label>
              <input class="form-control" name="txtLocation" value="{!! $tour->location !!}"
                     placeholder="Please Enter Location"/>
          </div>
          <div class="form-group">
              <label>Google Map</label>
              <input class="form-control" name="txtMap" value="{!! $tour->map  !!}"
                     placeholder="Please Enter Map Location"/>
          </div>
          <div class="form-group">
              <label>Intro</label>
              <textarea class="form-control" rows="3" name="txtIntro">{!! $tour->intro  !!}</textarea>
              <script type="text/javascript">ckeditor('txtIntro');</script>
          </div>
          <div class="form-group">
              <label>Nature</label>
              <textarea class="form-control" rows="3" name="txtNature">{!! $tour->nature  !!}</textarea>
              <script type="text/javascript">ckeditor('txtNature');</script>
          </div>
          <div class="form-group">
              <label>Nightlife info</label>
              <textarea class="form-control" rows="3" name="txtNightlife">{!! $tour->nightlife  !!}</textarea>
              <script type="text/javascript">ckeditor('txtNightlife');</script>
          </div>
          <div class="form-group">
              <label>History </label>
              <textarea class="form-control" rows="3" name="txtHistory">{!! $tour->history  !!}</textarea>
              <script type="text/javascript">ckeditor('txtHistory');</script>
          </div>
          <div class="form-group">
              <label>Visa Required</label>
              <label class="radio-inline">
                  <input name="rdoVisa" value="1" <?php if ($tour->status == 1) {
                  echo 'checked="checked"';
                  } ?>  type="radio">Yes
              </label>
              <label class="radio-inline">
                  <input name="rdoVisa" value="2" <?php if ($tour->status == 2) {
                  echo 'checked="checked"';
                  } ?>  type="radio">No
              </label>
          </div>
          <div class="form-group">
              <label>Tour Status</label>
              <label class="radio-inline">
                  <input name="rdoStatus" <?php if ($tour->status == 1) {
                  echo 'checked="checked"';
                  } ?> value="1" type="radio">Visible
              </label>
              <label class="radio-inline">
                  <input name="rdoStatus" value="2" <?php if ($tour->status == 2) {
                  echo 'checked="checked"';
                  } ?>  type="radio">Invisible
              </label>
          </div>
          <div class="form-group">
              <label>Show at</label>
              <label class="radio-inline">
                  <input name="txtTop" <?php if ($tour->showatindex == 1) {
                      echo 'checked="checked"';
                  } ?> value="1" type="checkbox">Index
              </label>
              <label class="radio-inline">
                  <input name="txtOffer" value="1" <?php if ($tour->showatoffer == 1) {
                      echo 'checked="checked"';
                  } ?>  type="checkbox">Latest offers
              </label>
          </div>
          <button type="submit" class="btn btn-default">Update</button>
          <button type="reset" class="btn btn-default">Reset</button>

      </div>

      <div class="col-md-1"></div>
      <div class="col-md-5">
          <div class="form-group">
              <label>Languge</label>
              <input class="form-control" name="txtLanguge" value="{!! $tour->language !!}"
                     placeholder="Please Enter Languages Spoken"/>
          </div>
          <div class="form-group">
              <label>Area</label>
              <input class="form-control" name="txtArea" value="{!! $tour->area !!}"
                     placeholder="Please Enter Area"/>
          </div>
          <div class="form-group">
              <label>Currency</label>
              <input class="form-control" name="txtCurrency" value="{!! $tour->currency !!}"
                     placeholder="Please Enter Currency"/>
          </div>
          <div class="form-group">
              <label>Main Image</label>
              <input type="file" name="imgtour">
          </div>
          <div class="form-group">
              <label>Detail Images Can Choose Multiple File</label>
              <input type="file" name="detailimg[]" multiple="true">
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5" id="imgdiv">
              <?php $images = json_decode($tour->images);?>
              @if(!isset($images))
                {!! "Not have Main Images, Please Choose Image To Upload !!!" !!}
              @endif
                  @foreach($images as $key => $image)
                      @if($key == 0)
                          <label>Main Image</label></br>
                          <img id="img{!! $key !!}" width="300" height="180" src="{!! asset("resources/upload/imagetour/$image") !!}"/>
                          <a href="Javascript:void(0)" id="id{!! $key !!}" data-key="{!! $key !!}" data-id="{!! $tour->id !!}" class="btn btn-danger btn-circle icon_del "><i class="fa fa-times"></i> </a></br></br>
                      @else
                          @if($key == 1)
                              <label>Detail Image</label></br>
                          @endif
                          <span class="delimg{!! $key !!}">
                          <img id="img{!! $key !!}" style="margin-bottom:10px" width="300" height="180" src="{!! asset("resources/upload/imagetour/$image") !!}"/>
                          <a href="Javascript:void(0)" id="id{!! $key !!}" data-key="{!! $key !!}" data-id="{!! $tour->id !!}" class="btn btn-danger btn-circle icon_del "><i class="fa fa-times"></i> </a>
                          </span>
                      @endif
                  @endforeach
          </div>
      </div>
  <form>

@endsection