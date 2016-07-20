<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BaseAdminController extends Controller
{
    //
	public function __construct()
	{
		view()->share('type', 'user');
	}
}
