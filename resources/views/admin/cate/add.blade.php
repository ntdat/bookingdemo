@extends('admin.master')
@section('controller-action','Add Category')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.block.error')
    <form action="{!! route('admin.cate.postadd') !!}" method="POST">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="txtParent">
                <option value="0">Please Choose Category</option>
               <?php  cate_parent($data) ?>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" type="radio">Invisible
            </label>
        </div>
        <button type="submit" class="btn btn-default">Category Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <form>
</div>
@endsection