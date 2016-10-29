@extends('admin.master')
@section('controller-action','List Car')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">
        <th>Name</th>
        <th>Images</th>
        <th>Price</th>
        <th>Status | Show at Index</th>
        <th>Tour Name</th>
        <th>Quality</th>
        <th>Updated</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $arr =array();
    ?>
    @foreach($listcar as $item)
    <tr class="odd gradeX" align="center">

        <td>{!! $item->name !!}</td>
        <td>
            <?php
                $arr = json_decode($item->images);
                $arr = (array)($arr);
                $img  = reset($arr);

            ?>
            @if($arr !=null)
                <img src="{!! asset('resources/upload/imagecar/thumb/'.$img) !!}"/>
            @else
                <label>Please Add Main Message</label>
            @endif
        </td>
        <td>{!! $item->price !!}</td>
        <td>
            <?php
                if($item->status == 1){
                    echo " <span class='label label-success'>Visible</span> ";
                }else{
                    echo " <span class='label label-danger'>Invisible</span> ";
                }
                if($item['showatindex'] == 1){
                    echo " <span class='label label-success'>Yes</span> ";
                }else{
                    echo " <span class='label label-danger'>No</span> ";
                }
            ?>
    </td>
        <td>
            <?php
              $tour =  \App\Tour::select('name')->where('id',$item->tour_id)->get()->first();
                echo $tour['name'];
            ?>
        </td>
        <td>{!! $item->quality !!}</td>

        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['updated_at']))->diffForHumans(); ?></td></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.car.getedit',$item->id) !!}">Edit</a></td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="confirm"  href="{!! URL::route('admin.car.getdelete',$item->id) !!}"> Delete</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection