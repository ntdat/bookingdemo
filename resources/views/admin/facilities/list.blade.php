@extends('admin.master')
@section('controller-action','List Room')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>Images</th>
            <th>Name</th>
            <th>Booking Type</th>
            <th>Update</th>
            <th>Position</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listfac as $item)
            <tr  class="odd gradeX" align="center">
                <td>


                    @if($item->images!="")
                        <img style="margin-top: 10px;margin-bottom: 10px;" src="{!! asset('resources/upload/thumbfac/'.$item->images) !!}"/>
                    @else
                        <i style="font-size:50px;margin-top: 10px;margin-bottom: 10px;" class="ace-icon fa {!! $item->icon !!}"></i>
                    @endif

                </td>
                <td>{!! $item->name !!}</td>
                <td><?php
                    $bookingtype =  substr($item->usefor,0,1);
                        switch($bookingtype)
                        {
                            case "1":
                            {
                                echo "Reservations";
                                break;
                            }
                            case "2":
                            {
                                echo "Rooms(Reservations)";
                                break;
                            }
                            case "3":
                            {
                                echo "Rent";
                                break;
                            }
                        }
                    ?></td>
                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['updated_at']))->diffForHumans(); ?></td></td>
                <td>{!! $item->position !!}</td>
                <td><?php
                    if($item->status == 1){
                        echo "<span class='label label-success'>Visible</span>";
                    }else{
                        echo "<span class='label label-danger'>Invisible</span>";
                    }
                    ?>
                </td>



                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="confirm"  href="{!! URL::route('admin.fac.getdelete',$item['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.fac.getedit',$item['id']) !!}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection