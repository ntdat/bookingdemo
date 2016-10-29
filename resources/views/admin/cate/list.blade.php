@extends('admin.master')
@section('controller-action','List Category')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">
        <th>ID</th>
        <th>Name</th>
        <th>Category Parent</th>
        <th>Status</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php $stt=0;
        ?>
    @foreach($list as $val )

        <tr class="even gradeC" align="center">
            <td>{!! ++$stt !!}</td>
            <td>{!! $val['name'] !!}</td>
            <td>
                @if($val['parent_id'] == 0)
                    {!! 'None' !!}
                @else
                    <?php
                    $parent = DB::table('categories')->where('id',$val['parent_id'])->first();
                    echo $parent->name;
                    ?>
                @endif
            </td>
            <td>
                @if($val['status'] == 1)
                    {!! "<span class='label label-success'>Visible</span>" !!}
                @else
                    {!! "<span class='label label-success'>Invisible</span>" !!}
                @endif
            </td>
            <td class="center"><i class=" fa fa-trash-o  fa-fw"></i><a class="confirm" href="{!! URL::route('admin.cate.delete',$val['id']) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit',$val['id']) !!}">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection