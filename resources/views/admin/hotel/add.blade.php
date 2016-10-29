@extends('admin.master')
@section('controller-action','Add Hotel')
@section('content')
    <form action="{!! route('admin.hotel.postadd') !!}" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">
            <div class="form-group">
                <label>Tour Parent</label>
                <select class="form-control" name="txtTourid">
                    <option value="">Please Choose Tour</option>
                    @for($i=0;$i<count($data);$i++)
                        @if (Input::old('txtTourid') == $data[$i]['id'])
                            <option value="{{ $data[$i]['id'] }}" selected>{{ $data[$i]['name'] }}</option>
                        @else
                            <option value="{{ $data[$i]['id'] }}">{{ $data[$i]['name'] }}</option>
                        @endif

                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>Categories Parent</label>
                <select class="form-control" name="txtCateid">
                    <option value="">Please Choose Categorie</option>
                    <?php cate_parent($cate,0,'--',0) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! old('txtName') !!}"
                       placeholder="Please Enter Name Hotel"/>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input class="form-control" name="txtLocation" value="{!! old('txtLocation') !!}"
                       placeholder="Please Enter Location"/>
            </div>
            <div class="form-group">
                <label>Map</label>
                <input class="form-control" name="txtMap" value="{!! old('txtMap') !!}"
                       placeholder="Please Enter Link Map"/>
            </div>
            <div class="form-group">
                <label>Pet</label>
                <input class="form-control" name="txtPet" value="{!! old('txtPet') !!}"
                       placeholder="Type Pet Agree"/>
            </div>
            <div class="form-group">
                <label>Paypent Method</label>
                <select  class="form-control" name="txtPayment[]" multiple>
                    <option value="1">Payment Later</option>
                    <option value="2">Visa Credit Card</option>
                    <option value="3">Master Credit Card</option>
                    <option value="4">American Express Credit Card</option>
                    <option value="5">Paypal</option>
                    <option value="6">Bank Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label>Type Hotel</label>
                <select class="form-control" name="txtStar">
                    <option value="">Please Choose Type Hotel</option>
                    @for($i=1;$i<=7;$i++)
                        <option value="{!! $i !!}">Hotel {!! $i !!} Star</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="txtDes">{!! old('txtDes') !!}</textarea>
                <script type="text/javascript">ckeditor('txtDes');</script>
            </div>
            <div class="form-group">
                <label>Children And Extra Beds</label>
                <textarea class="form-control" rows="3" name="txtRule">{!! old('txtRule') !!}</textarea>
                <script type="text/javascript">ckeditor('txtRule');</script>
            </div>
            <div class="form-group">
                <label>Hotel Status</label>
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
            <button type="submit" class="btn btn-default">Add Hotel</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </div>

        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="form-group col-md-10">
                <label>Facilities</label>
                <select class="form-control"  name="listfac[]" multiple>
                    @foreach($listfac as $key => $val)
                        <option value="{!! $key !!}">{!! $val !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-10" >
                <label>Time Check-In</label>
                <input class="form-control" id="txtCheckin" name="txtCheckin" value="{!! old('txtCheckin') !!}"
                       placeholder="Please Choose Time Check In"/>
            </div>
            <div class="form-group col-md-10">
                <label>Time Check-Out</label>
                <input class="form-control"  id="txtCheckout" name="txtCheckout" value="{!! old('txtCheckout') !!}"
                       placeholder="Please Choose Time Check Out"/>
            </div>

            <div class="form-group col-md-10">
                <label>Main Image</label>
                <input type="file" name="imghotel">
            </div>
            <div class="form-group col-md-10">
                <label>Detail Images Can Choose Multiple File</label>
                <input type="file" name="detailimg[]" multiple="true">
            </div>

        </div>
        </form>
</div>
@endsection