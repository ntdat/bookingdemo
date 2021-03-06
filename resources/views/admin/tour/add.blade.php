@extends('admin.master')
@section('controller-action','Add Tour')
@section('content')
    <form action="{!! route('admin.tour.postadd') !!}" method="POST" enctype="multipart/form-data">
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
                <label>Location</label>
                <input class="form-control" name="txtLocation" value="{!! old('txtLocation') !!}"
                       placeholder="Please Enter Location"/>
            </div>
            <div class="form-group">
                <label>Map</label>
                <input class="form-control" name="txtMap" value="{!! old('txtMap') !!}"
                       placeholder="Please Enter Map Location"/>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                <script type="text/javascript">ckeditor('txtIntro');</script>
            </div>
            <div class="form-group">
                <label>Nature</label>
                <textarea class="form-control" rows="3" name="txtNature">{!! old('txtNature') !!}</textarea>
                <script type="text/javascript">ckeditor('txtNature');</script>
            </div>
            <div class="form-group">
                <label>Nightlife info</label>
                <textarea class="form-control" rows="3" name="txtNightlife">{!! old('txtNightlife') !!}</textarea>
                <script type="text/javascript">ckeditor('txtNightlife');</script>
            </div>
            <div class="form-group">
                <label>History </label>
                <textarea class="form-control" rows="3" name="txtHistory">{!! old('txtHistory') !!}</textarea>
                <script type="text/javascript">ckeditor('txtHistory');</script>
            </div>
            <div class="form-group">
                <label>Visa Required</label>
                <label class="radio-inline">
                    <input name="rdoVisa" value="1" <?php if (Input::old('rdoVisa') == 1) {
                        echo 'checked="checked"';
                    } ?>  type="radio">Yes
                </label>
                <label class="radio-inline">
                    <input name="rdoVisa" value="2" <?php if (Input::old('rdoVisa') == 2) {
                        echo 'checked="checked"';
                    } ?>  type="radio">No
                </label>
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
                    <label class="radio-inline">
                        <input name="txtOffer" value="1" <?php if (Input::old('txtOffer') != "") {
                            echo 'checked="checked"';
                        } ?>  type="checkbox">Latest offers
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </div>

        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Languge</label>
                <input class="form-control" name="txtLanguge" value="{!! old('txtName') !!}"
                       placeholder="Please Enter Languages Spoken"/>
            </div>
            <div class="form-group">
                <label>Area</label>
                <input class="form-control" name="txtArea" value="{!! old('txtArea') !!}"
                       placeholder="Please Enter Area"/>
            </div>
            <div class="form-group">
                <label>Currency</label>
                <input class="form-control" name="txtCurrency" value="{!! old('txtCurrency') !!}"
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

        </div>
        </form>
@endsection