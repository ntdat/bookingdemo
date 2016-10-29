@extends('admin.master')
@section('controller-action','List Tour')
@section('content')
<div class="row">
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>Name</th>
            <th>Main Images</th>
            <th>Qty Hotel</th>
            <th>Category</th>
            <th>Status | Show at Top | Offer</th>
            <th>List Car</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)

            <?php
            $arr=array();
             $imgs =  json_decode($item->images);

            foreach($imgs  as $key => $value){
                $arr[$key] =$value;
            }
            ?>


            <tr class="odd gradeX" align="center">
                <td>{!! $item->name !!}</td>
                <td>
                    @if( isset($arr[0]))
                        <image height="100" width="120" src="{!! $url = asset('resources/upload/imagetour/'.$arr[0]) !!}" />
                    @else
                        <p>Not Have Main Image</p>
                    @endif
                </td>
                <td><?php
                    echo $hotel = \App\Hotel::select('id')->where('id',$item->id)->get()->count();
                    ?>
                </td>
                <td>
                    <?php $cate = DB::table('categories')->where('id',$item->cate_id)->first(); ?>
                    @if(!empty($cate->name))
                        {!! $cate->name !!}
                    @endif
                </td>
                <td>
                   <?php
                    if($item->status == 1){
                        echo " <span class='label label-success'>Visible</span> ";
                    }else{
                        echo " <span class='label label-danger'>Invisible</span> ";
                    }
                    if($item->showatindex == 1){
                        echo " <span class='label label-success'>Yes</span> ";
                    }else{
                        echo " <span class='label label-danger'>No</span> ";
                    }
                    if($item->showatoffer == 1){
                        echo " <span class='label label-success'>Yes</span> ";
                    }else{
                        echo " <span class='label label-danger'>No</span> ";
                    }
                        ?>
                </td>
                <td>
                    <a href="{!! Route('admin.tour.getcarbyid',$item->id) !!}">List Car</a>
                </td>
                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans(); ?></td>
                <td>
                    <a href="{!! URL::route('admin.tour.getedit',$item->id) !!}"><i class="fa fa-pencil fa-fw"></i> </a>
                    <a class="confirm" href="{!! URL::route('admin.tour.getdelete',$item->id ) !!}"><i class="fa fa-trash-o  fa-fw"></i></a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection