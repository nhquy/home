<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserPermissions;
use Faker\Provider\Uuid;
use App\Http\Requests\Admin\UserPermissionsRequest;
use WhiteFrame\Dynatable\Dynatable;

class UserPermissionsController extends Controller
{
	//
	public function __construct()
	{
		view()->share('type', 'userpermissions');
	}
	
	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.userpermissions.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.userpermissions.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $userPermissions
	 * @return Response
	 */
	public function edit(UserPermissions $userPermissions)
	{
		return view('admin.userpermissions.edit', compact('userPermissions'));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$userPermissions = UserPermissions::create($request->all());
		$userPermissions->save();
		return redirect("/admin/userpermissions");
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserPermissionsRequest $request, UserPermissions $userPermissions)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$userPermissions->update($request->all());
		return redirect("/admin/userpermissions");
	}
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$userPermissions = UserPermissions::query();
	
		$columns = ['id', 'name', 'created_at', 'updated_at', 'uuid'];
	
		// Build dynatable response
		$result = Dynatable::of($userPermissions, $columns, $request->all());
		return $result->make();
	}
}
