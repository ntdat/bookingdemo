@extends('admin.master')
@section('controller-action','List Car')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Images</th>
            <th>Price</th>
            <th>Status</th>
            <th>Calendar</th>
            <th>Quality</th>
            <th>Updated</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $stt = 0;
        $arr =array();
        ?>
        @foreach($listCar as $item)
            <tr class="odd gradeX" align="center">
                <td>{!!  ++$stt !!}</td>
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
                        echo '<span class="label label-success">Visible</span>';
                    }else{
                        echo '<span class="label label-success">Invisible</span>';
                    }
                    ?>
                </td>
                <td>
                    {{--// setup booking calendar--}}
                    <a href="javascript:void(0)"><i data-type="bookcar" data-id="{!! $item->id !!}" class="fa fa-calendar" data-toggle="modal" data-target="#myModal"></i></a>

                </td>

                <td>{!! $item->quality !!}</td>

                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['updated_at']))->diffForHumans(); ?></td></td>
                <td class="center">
                    <a href="{!! URL::route('admin.car.getedit',$item->id) !!}"><i class="fa fa-pencil fa-fw"></i></a>
                    <a class="confirm"  href="{!! URL::route('admin.car.getdelete',$item->id) !!}"><i class="fa fa-trash-o  fa-fw"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection