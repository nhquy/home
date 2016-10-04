<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\SystemSettings;
use WhiteFrame\Dynatable\Dynatable;
use App\Http\Requests\Admin\SystemSettingsRequest;
use Faker\Provider\Uuid;

class SystemSettingsController extends Controller
{
	//
	public function __construct()
	{
		view()->share('type', 'systemsettings');
	}

	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		// Get fluent collection of what you want to show in dynatable
		$systemSettings = SystemSettings::all();//->toArray();
		/*foreach ($systemSettings as $systemSetting){
			$settings = json_decode($systemSetting->settings);
			foreach ($settings as $item=>$value){
				echo $value;
			}
		}
		exit();*/
		return view('admin.systemsettings.index', array('systemSettings'=>$systemSettings));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.systemsettings.create');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $userGroup
	 * @return Response
	 */
	public function edit(SystemSettings $systemSettings)
	{
		return view('admin.systemSettings.edit', compact('systemSettings'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$systemSettings = SystemSettings::create($request->all());
		$systemSettings->save();
		return redirect("/admin/systemsettings");
	}
	public function save(Request $request)
	{
		$input = $array = array_except($request->all(), array('_token'));
		//dd($input);
		foreach ($input as $item=>$value){
			dd($value);
		}
		exit();
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(SystemSettingsRequest $request, SystemSettings $systemSettings)
	{
		$request->request->add(['uuid'=>Uuid::uuid()]);
		$systemSettings->update($request->all());
		return redirect("/admin/systemsettings");
	}
	/**
	 * Show a list of all the languages posts formatted for Dynatable.
	 *
	 * @return Dynatable JSON
	 */
	public function data(Request $request)
	{
		// Get fluent collection of what you want to show in dynatable
		$systemSettings = SystemSettings::query();

		$columns = ['id', 'category','settings', 'created_at', 'updated_at', 'uuid'];

		// Build dynatable response
		$result = Dynatable::of($systemSettings, $columns, $request->all());
		$json = $result->make();
		$settings = $json['records'][0]['settings'];
		return $json;
	}
}
