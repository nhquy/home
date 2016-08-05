<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Locales;
use Faker\Provider\Uuid;
use App\Http\Requests\Admin\LocalesRequest;
use WhiteFrame\Dynatable\Dynatable;

class LocalesControler extends Controller
{
	//
	public function __construct()
	{
		view()->share('type', 'locales');
	}
	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.locales.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.locales.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $locales
	 * @return Response
	 */
	public function edit(Locales $locales)
	{
		return view('admin.locales.edit', compact('locales'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$locales = Locales::create($request->all());
		$locales->save();
		return redirect("/admin/locales");
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(LocalesRequest $request, Locales $locales)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$locales->update($request->all());
		return redirect("/admin/locales");
	}
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$locales = Locales::query();
	
		$columns = ['id', 'locale', 'sort_order', 'created_at', 'updated_at', 'uuid'];
	
		// Build dynatable response
		$result = Dynatable::of($locales, $columns, $request->all());
		return $result->make();
	}
}
