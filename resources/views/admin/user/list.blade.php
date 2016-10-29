@extends('admin.master')
@section('content')
            <div class="row" id="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>List</small>
                    </h1>
                </div>
                @include('admin.block.error')

                <!-- /.col-lg-12 -->
                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt=0;

                    foreach(Sentinel::getUser()->roles as $role){
                             $userrole= $role->id;
                        }
                    ?>
                    @foreach($listusers as $user)
                        @foreach($user->roles as $role2)
                          @if($userrole< $role2->id  )
                              <tr  class="odd gradeX" align="center">

                                  <td>{!!  ++$stt !!}</td>
                                  <td class="username{!! $user->id !!}"> {!! $user->username !!}</td>
                                  <td class="role{!! $user->id !!}">
                                      @foreach($user->roles as $role2)
                                          {!! $role2->name !!}
                                      @endforeach
                                  </td>
                                  <td class="status">Hiện</td>
                                  <td class="center">
                                      <a href="" class="btn btn-info edituser" data-toggle="modal" data-target=".modaledituser" data-id="{!! $user->id !!}" data-token = '{!! csrf_token() !!}'><i class="fa fa-pencil fa-fw"></i>Edit</a>
                                      <a href="Javascript:void(0)" class="btn btn-danger deleteuser" data-id="{!! $user->id !!}" data-link="user" data-name="{!! $user->username !!}" data-token = '{!! csrf_token() !!}'><i class="fa fa-trash-o  fa-fw"></i></a>

                                  </td>
                              </tr>
                          @endif
                        @endforeach

                    @endforeach
                </table>
                <button type="button" id="adduser1" class="btn btn-success  " data-toggle="modal" data-target=".modaladduser"><i class="fa fa-plus"></i> Add User</button>
            </div>
            <!-- /.row -->
        <!-- /.container-fluid -->

            <div id="mymodal" class="modal fade modaladduser"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{!! route('admin.user.postadd') !!}" method="POST" id="formadduser">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add User</h4>
                            </div>
                            <div class="modal-body">

                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input  class="form-control" name="txtfirstname" placeholder="Please Enter First Name" />
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" name="txtlastname" placeholder="Please Enter Last Name" />
                                    </div>
                                    <div class="form-group ">
                                        <label>Username</label>
                                        <input class="form-control"  name="txtUsername" placeholder="Please Enter UserName" />
                                    </div>
                                    <div class="form-group password1">
                                        <label>Password</label>
                                        <input type="password"  name="pass" class="form-control" placeholder="Please Enter Password"  >
                                    </div>
                                    <div class="form-group password1">
                                        <label>RePassword</label>
                                        <input type="password"  name="pass_confirmation" class="form-control"  placeholder="Please Enter Password" >
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" />
                                    </div>
                                    <div class="form-group">
                                        <label>User Level</label>
                                        <label class="radio-inline">
                                            <input name="rdoLevel" value="1"    type="radio">Super Admin
                                        </label>
                                        <label class="radio-inline">
                                            <input name="rdoLevel" value="2"   type="radio">Admin
                                        </label>
                                        <label class="radio-inline">
                                            <input name="rdoLevel" value="3"    type="radio" checked>Super Moderator
                                        </label>
                                        <label class="radio-inline">
                                            <input name="rdoLevel" value="4"    type="radio" checked>Moderator
                                        </label>
                                        <label class="radio-inline">
                                            <input name="rdoLevel" value="5"    type="radio" checked>Member
                                        </label>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="adduser" class="updateuser btn btn-primary">Add User</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- modal edit user-->
            <div id="modaledituser" class="modal fade modaledituser"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{!! route('admin.user.postedit') !!}" method="POST" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                            </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input  class="form-control" name="firstname" placeholder="Please Enter First Name" />
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" name="lastname" placeholder="Please Enter Last Name" />
                                    </div>
                                    <div class="form-group ">
                                        <label>Username</label>
                                        <input class="form-control"  name="Username" placeholder="Please Enter UserName" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="Email" placeholder="Please Enter Email" />
                                    </div>
                                    <div class="form-group">
                                        <label>User Level</label>
                                        <label class="radio-inline">
                                            <input name="eLevel" value="1"    type="radio">Super Admin
                                        </label>
                                        <label class="radio-inline">
                                            <input name="eLevel" value="2"    type="radio">Admin
                                        </label>
                                        <label class="radio-inline">
                                            <input name="eLevel" value="3"    type="radio" checked>Super Moderator
                                        </label>
                                        <label class="radio-inline">
                                            <input name="eLevel" value="4"    type="radio" checked>Moderator
                                        </label>
                                        <label class="radio-inline">
                                            <input name="eLevel" value="5"    type="radio" checked>Member
                                        </label>
                                    </div>
                            </div>
                            <div class="modal-footer alertresult">
                                <button type="submit" id="edituser" class="updateuser btn btn-primary">Update User</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection