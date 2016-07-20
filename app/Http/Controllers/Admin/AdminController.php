<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController;

class AdminController extends BaseAdminController
{
    //
	public function __construct()
	{
		view()->share('type', 'user');
	}
}
