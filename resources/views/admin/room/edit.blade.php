@extends('admin.master')
@section('controller-action','Add Room')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="delete_thumb" id="delete_thumb" value="">
            <div class="form-group">

                <label>Hotel Parent</label>
                <select class="form-control" name="txtHotelid">
                    <option value="">Please Choose Hotel</option>
                    @for($i=0;$i<count($listhotel);$i++)
                        @if ($room->hotel_id == $listhotel[$i]['id'])
                            <option value="{{ $listhotel[$i]['id'] }}" selected>{{ $listhotel[$i]['name'] }}</option>
                        @else
                            <option value="{{ $listhotel[$i]['id'] }}">{{ $listhotel[$i]['name'] }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! $room->name !!}"
                       placeholder="Please Enter Name Room"/>
            </div>
            <div class="form-group">
                <label>Quality Room</label>
                <select name="txtQuality" class="form-control">
                    <option value="">Please Select Quality</option>
                    @for($i=0;$i<=50;$i++)
                        @if ( $room->quality == $i)
                            {!! "<option value='$i' selected>$i</option>" !!}
                        @else
                            {!! "<option value='$i'>$i</option>" !!}
                        @endif
                    @endfor
                </select>

            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" value="{!!  $room->price !!}"
                placeholder="Please Enter Number Room"/>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="txtStatus" <?php if ( $room->status == 1) {
                        echo 'checked="checked"';
                    } ?> value="1" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="txtStatus" value="2" <?php if ($room->status == 2) {
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
                <select class="form-control "  name="listfac[]" multiple>
                    @foreach($listfac as $key => $val)
                        @if( strpos($room->facilities,"$key") !==false))
                        <option selected value="{!! $key !!}">{!! $val !!}</option>
                        @else
                            <option value="{!! $key !!}">{!! $val !!}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-10">
                <label>Image Room</label>
                <input type="file" name="imgroom"><br/>
                <img id="thumbimg" src="{!! asset('resources/upload/imageroom/thumb/thumb'.$room->images) !!}"/>
                <a href="Javascript:void(0)" class="btn btn-danger btn-circle icon_del "><i class="fa fa-times"></i> </a>
            </div>
        </div>
        </form>
            </div>
@endsection