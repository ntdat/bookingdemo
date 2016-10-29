@extends('admin.master')
@section('controller-action','List Hotel')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">

        <th>Name</th>
        <th>Images</th>
        <th>Qty Room</th>
        <th>Tour Name</th>
        <th>Status | Show at Index</th>
        <th>Updated</th>
        <th>List Room</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $key=>$item)
    <tr class="odd gradeX" align="center">

        <td width="120">{!! $item['name'] !!}</td>
        <td>
            <?php
                $image = json_decode($item['images']);
                if($image !=null){
                    $arr =array();
                    foreach($image as $key =>$value){
                        $arr[]=$value;
                    }
                }
            ?>
            @if(isset($arr[0]))
                <img src="{!! asset('resources/upload/imagehotel/'.$arr[0]) !!}" style="height: 100px;width: 120px;"/>;
            @else
                <label>Please Add Main Message</label>
            @endif
        </td>
        <td><?php
            $room = \App\Room::select('id')->where('hotel_id',$item['id'])->get()->count();
            echo $room;
            ?>
        </td>
        <td><?php
             $tour = \App\Tour::select('name')->where('id',$item['tour_id'])->get()->first();
            echo $tour['name'];
            ?>
        </td>
        <td><?php
                if($item['status'] == 1){
                    echo " <span class='label label-success'>Visible</span> ";
                }else{
                    echo " <span class='label label-danger'>Invisible</span> ";
                }
                if($item['showatindex'] == 1){
                    echo " <span class='label label-success'>Yes</span> ";
                }else{
                    echo " <span class='label label-danger'>No</span> ";
                }

    ?></td>
        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans(); ?></td></td>
        <td><a  href="{!! URL::route('admin.hotel.getroom',$item['id']) !!}">List Room</a> </td>
        <td>
            <a href="{!! URL::route('admin.hotel.getedit',$item['id']) !!}"><i class="fa fa-pencil fa-fw"></i></a>
            <a class="confirm" href="{!! URL::route('admin.hotel.getdelete',$item['id']) !!}"><i class="fa fa-trash-o  fa-fw"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection