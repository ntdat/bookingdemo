@extends('admin.master')
@section('controller-action','Add Room')
@section('content')
    <form action="{!! route('admin.room.postadd') !!}" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">
            <div class="form-group">

                <label>Hotel Parent</label>
                <select class="form-control" name="txtHotelid">
                    <option value="">Please Choose Hotel</option>
                    @for($i=0;$i<count($listhotel);$i++)
                        @if (Input::old('txtHotelid') == $listhotel[0]['id'])
                            <option value="{{ $listhotel[$i]['id'] }}" selected>{{ $listhotel[$i]['name'] }}</option>
                        @else
                            <option value="{{ $listhotel[$i]['id'] }}">{{ $listhotel[$i]['name'] }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! old('txtName') !!}"
                       placeholder="Please Enter Name Room"/>
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
            <div class="form-group  col-md-10">
                <label>Image Room</label>
                <input type="file" name="imgroom">
            </div>
        </div>
        </form>
            </div>
@endsection