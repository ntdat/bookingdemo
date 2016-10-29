<?php namespace App\Http\Controllers;
use Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use Sentinel;


class UserController extends Controller {

    public function getlist()
    {

        $listusers = User::all();
        return view('admin.user.list',compact('listusers'));
    }

    public function postAdd()
    {
        if(Request::ajax()){

            if( Input::get('level') !=""){
                $credentials = [
                    'email'    => Input::get('email'),
                    'username'    =>Input::get('username'),
                    'password'    => Input::get('pass'),
                    'first_name'    => Input::get('fname'),
                    'last_name' => Input::get('lname'),
                ];
                $user = Sentinel::registerAndActivate($credentials);
                $role = Sentinel::findRoleById(Input::get('level'));
                $role->users()->attach($user);
                return  "1";
            }
        }
    }
    public function getedit()
    {
        if(Request::ajax())
        {
            $id = Input::get('id');
            $user = Sentinel::findById($id);
            foreach($user->roles as $role){
                $userrole=$role->id;
            }
            $user = $user->toArray();
            $user['role']=$userrole;
            return $user;
        }
    }
    public function postedit()
    {
        if(Request::ajax())
        {
            $id = Input::get('id');
            if( $id !=0){
                $credentials = [
                    'email'    => Input::get('email'),
                    'username'    =>Input::get('username'),
                    'first_name'    => Input::get('fname'),
                    'last_name' => Input::get('lname'),
                ];
                $level = Input::get('level');
                $user = Sentinel::findById($id);
                foreach($user->roles as $role2){
                    if($role2->id != $level){
                        $role = Sentinel::findRoleById($role2->id);
                        $role->users()->detach($user);
                        $role = Sentinel::findRoleById($level);
                        $role->users()->attach($user);
                        $credentials['level']=$role->name;
                    }
                }

                $user = Sentinel::update($user, $credentials);
                return  $credentials;
            }
        }
    }
    public function postDelete()
    {
        if(Request::ajax())
        {
           $id = Input::get('id');

            $user = Sentinel::findById($id);

            $user->delete();
            return "1";
        }
    }
}
