<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Content;
use Faker\Provider\Uuid;
use App\Http\Requests\Admin\ContentRequest;
use WhiteFrame\Dynatable\Dynatable;

class ContentController extends Controller
{
//
	public function __construct()
	{
		view()->share('type', 'content');
	}
	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.content.index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.content.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $locales
	 * @return Response
	 */
	public function edit(Content $content)
	{
		return view('admin.content.edit', compact('content'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$content = Content::create($request->all());
		$content->save();
		return redirect("/admin/content");
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ContentRequest $request, Content $content)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$content->update($request->all());
		return redirect("/admin/content");
	}
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$content = Content::query();
	
		$columns = ['id', 'locale', 'title', 'field_body', 'created_at', 'updated_at', 'uuid'];
	
		// Build dynatable response
		$result = Dynatable::of($content, $columns, $request->all());
		return $result->make();
	}
}
