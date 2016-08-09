<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Groups;
use Faker\Provider\Uuid;
use WhiteFrame\Dynatable\Dynatable;
use App\Http\Requests\Admin\GroupRequest;

class GroupController extends Controller
{
//
	public function __construct()
	{
		view()->share('type', 'group');
	}

	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.groups.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.groups.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $group
	 * @return Response
	 */
	public function edit(Groups $group)
	{
		return view('admin.groups.edit', compact('group'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$group = Groups::create($request->all());
		$group->save();
		
		return redirect("/admin/group");
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(GroupRequest $request, Groups $group)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$group->update($request->all());
		return redirect("/admin/group");
	}
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$groups = Groups::query();

		$columns = ['id', 'name','description', 'active', 'created_at', 'updated_at', 'uuid'];

		// Build dynatable response
		$result = Dynatable::of($groups, $columns, $request->all());
		return $result->make();
	}
	
}
