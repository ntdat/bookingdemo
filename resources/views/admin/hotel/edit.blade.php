@extends('admin.master')
@section('controller-action','Edit Hotel')
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="hdid" value="{!! $data['id'] !!}"/>
            <input type="hidden" id="inforimg" name="inforimg" value=""/>
            <div class="form-group">

                <label>Tour Parent</label>
                <select class="form-control" name="txtTourid">
                    <option value="">Please Choose Tour</option>
                    @for($i=0;$i<count($tour);$i++)
                        <option
                                @if($data['tour_id']==$tour[$i]['id'])
                                      {!! "selected" !!}
                                @endif
                                value="{!! $tour[$i]['id']!!}"> -- {!! $tour[$i]['name'] !!}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>Categories Parent</label>
                <select class="form-control" name="txtCateid">
                    <option value="">Please Choose Categorie</option>
                    <?php cate_parent($cate,0,'--',$data['cate_id']) ?>
                </select>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! $data['name'] !!}"
                       placeholder="Please Enter Name Hotel"/>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input class="form-control" name="txtLocation" value="{!! $data['location'] !!}"
                       placeholder="Please Enter Location"/>
            </div>
            <div class="form-group">
                <label>Google Map</label>
                <textarea  placeholder="Please Enter Map Location" name="txtMap" class="form-control">{!! $data['map'] !!}</textarea>

            </div>
            <div class="form-group">
                <label>Type Hotel</label>
                <select class="form-control" name="txtStar">
                    <option value="">Please Choose Type Hotel</option>
                    @for($i=1;$i<=7;$i++)
                        <option <?php
                                if(($data['star'] == $i)) echo "selected"
                                ?>

                                value="{!! $i !!}">Hotel {!! $i !!} Star</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>Pet</label>
                <input class="form-control" name="txtPet" value="{!! $data['pet'] !!}"
                       placeholder="Type Pet Agree"/>
            </div>
            <div class="form-group">
                <label>Paypent Method</label>
                <?php
                $listpayment= $data['payment'];
                ?>
                <select  class="form-control" name="txtPayment[]" multiple>
                    <option value="1"<?php if(strpos($listpayment,"1") !== false){echo 'selected';} ?>>Payment Later</option>
                    <option value="2"<?php if(strpos($listpayment,"2") !== false){echo 'selected';} ?>>Visa Credit Card</option>
                    <option value="3"<?php if(strpos($listpayment,"3") !== false){echo 'selected';} ?>>Master Credit Card</option>
                    <option value="4"<?php if(strpos($listpayment,"4") !== false){echo 'selected';} ?>>American Express Credit Card</option>
                    <option value="5"<?php if(strpos($listpayment,"5") !== false){echo 'selected';} ?>>Discover Credit Card</option>
                    <option value="6"<?php if(strpos($listpayment,"6") !== false){echo 'selected';} ?>>Paypal</option>
                    <option value="7"<?php if(strpos($listpayment,"7") !== false){echo 'selected';} ?>>Bank Transfer</option>
                </select>

            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="txtDes">{!! $data['des'] !!}</textarea>
                <script type="text/javascript">ckeditor('txtDes');</script>
            </div>
            <div class="form-group">
                <label>Children And Extra Beds</label>
                <textarea class="form-control" rows="3" name="txtRule">{!! $data['extrarule'] !!}</textarea>
                <script type="text/javascript">ckeditor('txtRule');</script>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="txtStatus" <?php if ($data['status'] == 1) {
                        echo 'checked="checked"';
                    } ?> value="1" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="txtStatus" value="2" <?php if ($data['status'] == 2) {
                        echo 'checked="checked"';
                    } ?>  type="radio">Invisible
                </label>
            </div>
            <div class="form-group">
                <label>Show At Index</label>
                <label class="radio-inline">
                    <input name="txtTop" <?php if ($data['showatindex'] == 1) {
                        echo 'checked="checked"';
                    } ?> value="1" type="checkbox">
                </label>
            </div>
            <button type="submit" class="btn btn-default"  data-infor="">Update</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </div>

        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="form-group col-md-10">
                <label>Facilities</label>
                <select class="form-control "  name="listfac[]" multiple>
                    @foreach($listfac as $key => $val)
                        @if( strpos($data['facilities'],"$key") !==false))
                            <option selected value="{!! $key !!}">{!! $val !!}</option>
                        @else
                            <option value="{!! $key !!}">{!! $val !!}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-10" >
                <label>Time Check-In</label>
                <input class="form-control" style="width: 300px;" id="txtCheckin" name="txtCheckin" value="{!! $data['checkin'] !!}"
                       placeholder="Please Select Time Check In"/>
            </div>
            <div class="form-group col-md-10">
                <label>Time Check-Out</label>
                <input class="form-control" style="width: 300px;" id="txtCheckout" name="txtCheckout" value="{!! $data['checkout'] !!}"
                       placeholder="Please Select Time Check Out"/>
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
        <div class="col-md-5" style="padding-left: 30px;"  id="imgdiv">

            <?php $images = json_decode($data['images']);
            if($images == null){
                echo " <label>Please Add More Images</label>";
                }
                else{
            ?>
            @if(!isset($images))
                {!! "Not have Main Images, Please Choose Image To Upload !!!" !!}
            @endif
            @foreach($images as $key => $image)
                @if($key == 0)
                    <label>Main Image</label></br>
                    <img id="img{!! $key !!}" width="300" height="180" src="{!! asset("resources/upload/imagehotel/$image") !!}"/>
                    <a href="Javascript:void(0)" id="id{!! $key !!}" data-key="{!! $key !!}" data-id="{!! $data['id'] !!}" class="btn btn-danger btn-circle icon_del "><i class="fa fa-times"></i> </a></br></br>
                @else
                    @if($key == 1)
                        <label>Detail Image</label></br>
                    @endif
                    <span class="delimg{!! $key !!}">
                          <img id="img{!! $key !!}" style="margin-bottom:10px" width="300" height="180" src="{!! asset("resources/upload/imagehotel/$image") !!}"/>
                          <a href="Javascript:void(0)" id="id{!! $key !!}" data-key="{!! $key !!}" data-id="{!! $data['id'] !!}" class="btn btn-danger btn-circle icon_del "><i class="fa fa-times"></i> </a>
                          </span>
                @endif
            @endforeach
            <?php }?>
        </div>
        <form>
</div>
@endsection
