@extends('layouts.admin')

@section('content')
		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>System Settings Manager</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="row">
              	<div class="col-md-12 col-sm-12 col-xs-12">
              		<div class="x_panel">
	                  <div class="x_title">
	                    <h2>Table design <small>Custom design</small></h2>
	                    <ul class="nav navbar-right panel_toolbox">
	                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                      </li>
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
	                        <ul class="dropdown-menu" role="menu">
	                          <li><a href="#">Settings 1</a>
	                          </li>
	                          <li><a href="#">Settings 2</a>
	                          </li>
	                        </ul>
	                      </li>
	                      <li><a class="close-link"><i class="fa fa-close"></i></a>
	                      </li>
	                    </ul>
	                    <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">
						<a href="{{ url('/admin/'.$type.'/create') }}" class="btn btn-app">
	                      <i class="fa fa-plus-circle"></i>
	                      Create
	                    </a>
	                    <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

	                    <div class="table-responsive">
							<table id="table-main" class="table table-bordered">
							  <thead>
							    <th>Category</th>
							    <th>Settings</th>
							    <th data-dynatable-read="created_at">Created At</th>
							    <th data-dynatable-read="updated_at" >Updated At</th>
							    <th data-dynatable-read="action">Action</th>
							  </thead>
							  <tbody>
							  </tbody>
							</table>
	                    </div>
	                </div>
                 </div>
              	</div>
              </div>
            </div>
          </div>
        </div>
       <!-- /page content -->
@endsection
