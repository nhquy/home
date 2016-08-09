<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use WhiteFrame\Dynatable\Dynatable;
use App\Http\Requests\Admin\GroupPermissionRequest;
use App\GroupsPermissions;
use Faker\Provider\Uuid;
use App\Groups;
use App\Permissions;

class GroupPermissionController extends Controller
{
	public function __construct()
	{
		view()->share('type', 'groupspermissions');
	}

	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.groupspermissions.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$groups = Groups::lists('name', 'id')->toArray();
		$permissions = Permissions::lists('name', 'id')->toArray();
		return view('admin.groupspermissions.create', compact('groups', 'permissions'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $group
	 * @return Response
	 */
	public function edit(GroupsPermissions $groupspermissions)
	{
		$groups = Groups::lists('name', 'id')->toArray();
		$permissions = Permissions::lists('name', 'id')->toArray();
		return view('admin.groupspermissions.edit', compact('groupspermissions', 'groups', 'permissions'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$groupspermissions = GroupsPermissions::create($request->all());
		$groupspermissions->save();
		
		return redirect("/admin/groupspermissions");
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(GroupPermissionRequest $request, GroupsPermissions $groupspermissions)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$groupspermissions->update($request->all());
		return redirect("/admin/groupspermissions");
	}
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$groupspermissions = GroupsPermissions::query();

		$columns = ['id', 'group_id','permission_id', 'created_at', 'updated_at', 'uuid'];

		// Build dynatable response
		$result = Dynatable::of($groupspermissions, $columns, $request->all());
		return $result->make();
	}
}
