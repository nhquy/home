<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Http\Requests\Admin\MenuRequest;
use Faker\Provider\Uuid;
use WhiteFrame\Dynatable\Dynatable;

class MenuController extends Controller
{
	//
	public function __construct()
	{
		view()->share('type', 'menu');
	}
	
	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.menu.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.menu.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $locales
	 * @return Response
	 */
	public function edit(Menu $menu)
	{
		return view('admin.menu.edit', compact('menu'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$menu = Menu::create($request->all());
		$menu->save();
		
		return redirect("/admin/menu");
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(MenuRequest $request, Menu $menu)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$menu->update($request->all());
		return redirect("/admin/menu");
	}
	
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$menu = Menu::query();
	
		$columns = ['id', 'title','alias', 'menu_type', 'link', 'note', 'created_at', 'updated_at', 'uuid'];
	
		// Build dynatable response
		$result = Dynatable::of($menu, $columns, $request->all());
		return $result->make();
	}
}
