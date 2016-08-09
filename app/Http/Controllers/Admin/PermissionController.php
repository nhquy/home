<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permissions;
use Faker\Provider\Uuid;
use WhiteFrame\Dynatable\Dynatable;
use App\Http\Requests\Admin\PermissionsRequest;

class PermissionController extends Controller
{
	//
	public function __construct()
	{
		view()->share('type', 'permissions');
	}
	
	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.permissions.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.permissions.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $userPermissions
	 * @return Response
	 */
	public function edit(Permissions $permissions)
	{
		return view('admin.permissions.edit', compact('permissions'));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$permissions = Permissions::create($request->all());
		$permissions->save();
		return redirect("/admin/permissions");
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(PermissionsRequest $request, Permissions $permissions)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$permissions->update($request->all());
		return redirect("/admin/permissions");
	}
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$permissions = Permissions::query();
	
		$columns = ['id', 'name', 'text', 'source', 'created_at', 'updated_at', 'uuid'];
	
		// Build dynatable response
		$result = Dynatable::of($permissions, $columns, $request->all());
		return $result->make();
	}
}
