<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use WhiteFrame\Dynatable\Dynatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Faker\Provider\Uuid;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
	//
	public function __construct()
	{
		view()->share('type', 'user');
	}
	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.user.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.user.create');
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
		$request->merge(['password' => bcrypt($request->password)]);
		$request->merge(['password_confirmation' => bcrypt($request->password_confirmation)]);
		$request->request->add(['uuid'=>Uuid::uuid()]);
		//var_dump($request->all());
		//exit();
		//$request->merge(['uuid' => Uuid::uuid()]);
		$user = User::create($request->all());
		//$this->validator($request);
		//$user = new User ($request->except('password','password_confirmation'));
		//$user->password = bcrypt($request->password);
		//$user->confirmation_code = str_random(32);
		//$user->save();
		return redirect("/admin/user");
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	/*public function edit($uuid)
	{
		
		return view('admin.user.edit');
	}*/
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $user
	 * @return Response
	 */
	public function edit(User $user)
	{
		return view('admin.user.edit', compact('user'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserRequest $request, User $user)
	{
		//
		$password = $request->password;
		$passwordConfirmation = $request->password_confirmation;

		if (!empty($password)) {
			if ($password === $passwordConfirmation) {
				$user->password = bcrypt($password);
			}
		}
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$user->update($request->except('password','password_confirmation'));
		return redirect("/admin/user");
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	/*public function destroy($id)
	{
		//
	}*/
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $user
	 * @return Response
	 */
	
	public function delete(User $user)
	{
		return view('admin.user.delete', compact('user'));
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $user
	 * @return Response
	 */
	public function destroy(User $user)
	{
		$user->delete();
	}
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	/*protected function validator(Request $request)
	{
		return Validator::make($request, [
				'name' => 'required|max:255',
				'username' => 'required|max:255',
				'email' => 'required|email|max:255|unique:users',
				'password' => 'required|min:6|confirmed',
		]);
	}*/
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$users = User::query();
		
		$columns = ['id', 'name', 'username', 'email', 'created_at', 'updated_at', 'uuid'];
	
		// Build dynatable response
		$result = Dynatable::of($users, $columns, $request->all());
		return $result->make();
	}
}
