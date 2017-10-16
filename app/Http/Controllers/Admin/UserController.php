<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
	protected $user;
	public function __construct(
		User $user
	)
	{
		$this->user = $user;
	}
    public function getList()
    {
    	$users = $this->user->all();
    	return view('admin.user.user',compact("users"));
    }
    public function postEdit(Request $request){
    	if(!$request->ajax())
    	{
    		return false;
    	}
    	$user = $this->user->find($request->id);
        $user->status = $request->status;
        $user->save();
        return response($request->all());

    }
}
