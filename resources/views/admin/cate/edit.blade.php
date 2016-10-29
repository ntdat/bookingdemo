@extends('admin.master')
@section('controller-action','Edit Category')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.block.error')
    <form  method="POST" action="">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="txtParent">
                <option value="0">Please Choose Category</option>
                <?php  cate_parent( $parent,0,"--",$data['parent_id']) ?>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" value="{!! old('txtCateName',isset($data) ? $data['name'] : null) !!}" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Status</label>
            <?php if($data['status'] ==1){
                    $check1 = 'checked="checked"';
                    $check2 = '';
                }else{
                $check1 = '';
                $check2 = 'checked="checked"';
        }
            ?>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" {!! $check1 !!} type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" {!! $check2 !!} type="radio">Invisible
            </label>
        </div>
        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <form>
</div>
@endsection