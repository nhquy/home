<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\Admin\CategoryRequest;
use Faker\Provider\Uuid;
use WhiteFrame\Dynatable\Dynatable;

class CategoryController extends Controller
{
	//
	public function __construct()
	{
		view()->share('type', 'categories');
	}
	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.categories.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.categories.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $locales
	 * @return Response
	 */
	public function edit(Category $categories)
	{
		return view('admin.categories.edit', compact('categories'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$categories = Category::create($request->all());
		$categories->save();
	
		return redirect("/admin/categories");
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CategoryRequest $request, Category $categories)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$categories->update($request->all());
		return redirect("/admin/categories");
	}
	
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$categories = Category::query();
	
		$columns = ['id', 'title','alias', 'note', 'created_at', 'updated_at', 'uuid'];
	
		// Build dynatable response
		$result = Dynatable::of($categories, $columns, $request->all());
		return $result->make();
	}
}
