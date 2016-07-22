<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserGroup;
use WhiteFrame\Dynatable\Dynatable;
class UserGroupController extends Controller
{
    //
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
