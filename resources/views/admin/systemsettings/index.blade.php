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
                          <!--<a href="#" class="btn btn-primary">Add Category</a>-->
                          <button id="scategory" type="submit" class="btn btn-success">Add Category</button>
                        </div>
                      {!! Form::close() !!}
                      {!! Form::open(array('url' => url('admin/'.$type.'/save'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'enctype'=>'application/json')) !!}
                        <div class="item form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                        		<div class="x_panel">
	                                <div class="x_content">
	                                	<div class="col-xs-3">
					                      <!-- required for floating -->
					                      <!-- Nav tabs -->
					                      <ul class="nav nav-tabs tabs-left">
                                  @foreach ($systemSettings as $systemSetting)
                                    @php
                                      
                                    @endphp
                                      <li class="active">
                                    @php
                                      <li>
                                    @endphp
                                        <a href="#{{ $systemSetting->category }}" data-href="{{ $systemSetting->category }}" data-toggle="tab" class="tab-category">{{ ucfirst($systemSetting->category) }}</a>
                                      </li>
                                  @endforeach
					                        </li>
					                      </ul>
					                    </div>
					                    <div class="col-xs-9">
					                      <!-- Tab panes -->
					                      <div class="tab-content">
                                    <div class="buttons">
                                      <a class="btn btn-default btn-xs add-properties">Add properties</a>
                                    </div>
                                  @foreach ($systemSettings as $systemSetting)
                                    <div class="tab-pane" id="{{ $systemSetting->category }}">
					                          <!--<p class="lead">Home tab</p>-->
					                          <!-- <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
					                            synth. Cosby sweater eu banh mi, qui irure terr.</p>-->

					                              <div class="item form-group">
			                                    <div class="col-md-4 col-sm-4 col-xs-4">
			                                      {!! Form::label('name', trans("admin/systemsettings.property_name"), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
			                                    </div>
			                                    <div class="col-md-4 col-sm-4 col-xs-4">
			                                      {!! Form::label('value', trans("admin/systemsettings.property_value"), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
			                                    </div>
                                          <div class="col-md-4 col-sm-4 col-xs-4">
                                            {!! Form::label('name', trans("admin/systemsettings.action"), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                          </div>
			                                  </div>
                                        @php
                                          $category = $systemSetting->category;
                                        @endphp
			                                  <div class="item form-group">
                                          {{ Form::hidden($category.'[uuid]', $systemSetting->uuid, array('id' => '')) }}
			                                  	@php
                                            if(!empty($systemSetting->settings)){
                                              $settings = json_decode($systemSetting->settings, true);
                                              $j=0;
                                              foreach ($settings as $item=>$value){
                                          @endphp
                                          <div class="form-horizontal">
                                            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
  			                                      {!! Form::text($category.'[name]['.$j.']', $item, array('class' => 'form-control col-md-7 col-xs-12 item-properties-name', 'required'=>'required')) !!}
  			                                    </div>
  			                                    <div class="col-md-4 col-sm-4 col-xs-4 form-group">
  			                                      {!! Form::text($category.'[value]['.$j.']', $value, array('class' => 'form-control col-md-7 col-xs-12 item-properties-value', 'required'=>'required')) !!}
  			                                    </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                                              <div class="btn-group">
                                                <a class="btn btn-default">Save</a>
                                                <a class="btn btn-default">Delete</a>
                                              </div>
                                            </div>
                                          </div>
                                          @php
                                                $j++;
                                              }
                                            }else{
                                          @endphp
                                          <div class="form-horizontal">
                                            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                                              {!! Form::text($category.'[name][0]', '', array('class' => 'form-control col-md-7 col-xs-12 item-properties-name', 'required'=>'required')) !!}
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                                              {!! Form::text($category.'[value][0]', '', array('class' => 'form-control col-md-7 col-xs-12 item-properties-value', 'required'=>'required')) !!}
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                                              <div class="btn-group">
                                                <a class="btn btn-default">Save</a>
                                                <a class="btn btn-default">Delete</a>
                                              </div>
                                            </div>
                                          </div>
                                          @php
                                              }
                                          @endphp
                                          <input name="{{$category}}[category]" value="{{$systemSetting->category}}" type="hidden">
			                                </div>
					                        </div>
					                        <!--<div class="tab-pane" id="profile">Profile Tab.</div>
					                        <div class="tab-pane" id="messages">Messages Tab.</div>
					                        <div class="tab-pane" id="settings">Settings Tab.</div>-->
                                  @endforeach
					                      </div>
					                    </div>
					                    <div class="clearfix"></div>
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
