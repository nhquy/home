<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Faker\Provider\Uuid;
use App\Media;
use Illuminate\Http\Response;

class MediaController extends Controller
{
	protected $image;
	//
	public function __construct()
	{
		view()->share('type', 'media');
	}
	
	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.media.index');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if($request->ajax()){
			$file = $request->file( 'file' );
			$destinationPath = public_path() . '/uploads/';
			$filename = $file->getClientOriginalName();
			$upload_success = $request->file( 'file' )->move($destinationPath, $filename);
		}
		
		
		/*$request->request->add(['uuid'=>Uuid::uuid()]);
		$media = Media::create($request->all());
		$media->save();*/
		//return redirect("/admin/permissions");
	}
}
