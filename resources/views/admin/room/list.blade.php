@extends('admin.master')
@section('controller-action','List Room')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">
        <th>Name</th>
        <th>Images</th>
        <th>Status</th>
        <th>Quality</th>
        <th>Hotel Name</th>
        <th>Date</th>
        <th>Delete</th>
        <th>Edit</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $stt = 0;
    $arr =array();
    ?>
    @foreach($listroom as $item)
    <tr class="odd gradeX" align="center">
        <td>{!! $item->name !!}</td>
        <td>

            @if(isset($item->images))
                <img src="{!! asset('resources/upload/imageroom/thumb/thumb'.$item->images) !!}"/>
            @else
                <label>Please Add Main Message</label>
            @endif
        </td>
        <td><?php
                if($item->status == 1){
                    echo "<span class='label label-success'>Visible</span>";
                }else{
                    echo "<span class='label label-danger'>Invisible</span>";
                }
    ?></td>
        <td>{!! $item->quality !!}</td>
        <td>
            @foreach($listhotel as $hotel)
                @if($hotel->id == $item->hotel_id)
                    {!! $hotel->name !!}
                @endif
            @endforeach
        </td>
        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans(); ?></td></td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="confirm"  href="{!! URL::route('admin.room.getdelete',$item['id']) !!}"> Delete</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.room.getedit',$item['id']) !!}">Edit</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection