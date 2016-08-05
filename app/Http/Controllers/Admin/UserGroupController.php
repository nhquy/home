<?php

namespace App\Http\Controllers\Admin;


use App\UserGroup;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use WhiteFrame\Dynatable\Dynatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserGroupRequest;
class UserGroupController extends Controller
{
	//
	public function __construct()
	{
		view()->share('type', 'usergroup');
	}

	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.usergroup.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.usergroup.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $userGroup
	 * @return Response
	 */
	public function edit(UserGroup $userGroup)
	{
		return view('admin.usergroup.edit', compact('userGroup'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		/*$user =  User::create([
		 'name' => $request['name'],
		 'email' => $request['email'],
		 'password' => bcrypt($request['password']),
		]);*/
		/*$request->merge(['password' => bcrypt($request->password)]);
		$request->merge(['password_confirmation' => bcrypt($request->password_confirmation)]);*/
		$request->request->add(['uuid'=>Uuid::uuid()]);
		//var_dump($request->all());
		//exit();
		//$request->merge(['uuid' => Uuid::uuid()]);
		$usergroup = UserGroup::create($request->all());
		$usergroup->save();
		//$this->vseralidator($request);
		//$user = new User ($request->except('password','password_confirmation'));
		//$user->password = bcrypt($request->password);
		//$user->confirmation_code = str_random(32);
		//$user->save();
		return redirect("/admin/usergroup");
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserGroupRequest $request, UserGroup $userGroup)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$userGroup->update($request->all());
		return redirect("/admin/usergroup");
	}
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$users = UserGroup::query();

		$columns = ['id', 'name','handle', 'created_at', 'updated_at', 'uuid'];

		// Build dynatable response
		$result = Dynatable::of($users, $columns, $request->all());
		return $result->make();
	}
}
