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
                      {!! Form::open(array('url' => url('admin/'.$type), 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'files'=> true)) !!}
                        <span class="section">System Settings Info</span>
                        <div class="item form-group">
                          {!! Form::label('category', trans("admin/systemsettings.category"), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('category', null, array('class' => 'form-control col-md-7 col-xs-12', 'required'=>'required')) !!}
                          </div>
                          <a href="#" class="btn btn-primary">Add Category</a>
                        </div>
                        <div class="item form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                        		<div class="x_panel">
                                <div class="x_content">
                                  <div class="item form-group">
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                      {!! Form::label('name', trans("admin/systemsettings.name"), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                      {!! Form::label('value', trans("admin/systemsettings.value"), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                      {!! Form::text('name', null, array('class' => 'form-control col-md-7 col-xs-12', 'required'=>'required')) !!}
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                      {!! Form::text('value', null, array('class' => 'form-control col-md-7 col-xs-12', 'required'=>'required')) !!}
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
      		                <div class="form-group">
      		                    <div class="col-md-6 col-md-offset-3">
      		                        <button type="submit" class="btn btn-primary">Cancel</button>
      		                        <button id="send" type="submit" class="btn btn-success">Submit</button>
      		                    </div>
      		                </div>
                      {!! Form::close() !!}
	                </div>
                 </div>
              	</div>
              </div>
            </div>
          </div>
        </div>
       <!-- /page content -->
@endsection
