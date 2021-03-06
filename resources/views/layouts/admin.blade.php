<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Admin Manager</title>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery-2.2.4.js') }}"></script>
    <!-- Bootstrap -->
    <link href="{{ asset('lib/bootstrap-3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('lib/font-awesome-4.6.3/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('lib/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery Dynatable -->
    <link href="{{ asset('lib/jquery-dynatable/jquery.dynatable.css') }}" rel="stylesheet">
    <script src="{{ asset('lib/jquery-dynatable/jquery.dynatable.js') }}"></script>
	<!-- Dropzone  -->
	<link href="{{ asset('lib/dropzone/basic.css') }}" rel="stylesheet">
	<script src="{{ asset('lib/dropzone/dropzone.js') }}"></script>
	
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
</head>
<body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title">
              	<i class="fa fa-paw"></i>
              	<span>Gentellela Alela!</span>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="{{ asset('/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>
                  	<a>
                  		<i class="fa fa-home"></i>
                  		Home <span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/') }}">Dashboard</a></li>
                      <!-- <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>-->
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-user"></i> Users
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/user/') }}">Users Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-users"></i> User Groups
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/usergroup/') }}">User Groups Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-users"></i> User Permissions
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/userpermissions/') }}">User Permissions Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-users"></i> Locales
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/locales/') }}">Locales Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-users"></i> Content
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/content/') }}">Content Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-users"></i> Permissions
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/permissions/') }}">Permissions Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-users"></i> Groups
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/group/') }}">Groups Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-users"></i> GroupsPermissions 
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/groupspermissions/') }}">GroupsPermissions Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-wrench"></i> System Settings
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/systemsettings/') }}">System Settings Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-wrench"></i> Media Manager 
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/media/') }}">Media Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-wrench"></i> Menu Manager 
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/menu/') }}">Menu Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-wrench"></i> Categories Manager 
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/categories/') }}">Categories Manager</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-desktop"></i> UI Elements
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <!-- <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>-->
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-table"></i> Tables
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-bar-chart-o"></i> Data Presentation
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <!-- <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>-->
                    </ul>
                  </li>
                  <li>
                  	<a>
                  		<i class="fa fa-clone"></i>Layouts
                  		<span class="fa fa-chevron-down"></span>
                  	</a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <!-- Content -->
		@yield('content')
		<!-- Content End -->
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

</body>

    <!-- Bootstrap -->
    <script src="{{ asset('lib/bootstrap-3.3.6/js/bootstrap.min.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('lib/nprogress/nprogress.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/admin/main.js') }}"></script>
    <script src="{{ asset('js/admin/js.js') }}"></script>
    <script>
      $(document).ready(function(){
        $('#table-main').dynatable({
          table: {
            bodyRowSelector: 'li'
          },
          dataset: {
      	    ajax: true,
      	    ajaxUrl: '{{ url('admin/'.$type.'/data') }}',
      	    ajaxOnLoad: true,
      	    records: []
      	  },
          writers: {
            _rowWriter: DefaultRowWriter,
            _cellWriter: DefaultCellWriter
          },
        });
      });
      
      function createAction(id, uuid){
        var view, edit, del, html;
        view = "<a class='btn btn-primary btn-xs' data-uuid='{!!$type!!}' href='{!!$type!!}/"+id+"/view'><i class='fa fa-folder'></i> View </a>";
        edit = "<a class='btn btn-info btn-xs' href='{!!$type!!}/"+id+"/edit/'><i class='fa fa-pencil'></i> Edit </a>";
        del = "<a class='btn btn-danger btn-xs' href='{!!$type!!}/"+id+"/delete'><i class='fa fa-trash-o'></i> Delete </a>";
        html = view+edit+del;
        return html;
      };
      function DefaultRowWriter(rowIndex, record, columns, cellWriter) {
        var tr = '';

        // grab the record's attribute for each column
        for (var i = 0, len = columns.length; i < len; i++) {
          tr += cellWriter(columns[i], record);
        }

        return '<tr>' + tr + '</tr>';
      }
      function DefaultCellWriter(column, record) {
    	  var html = column.attributeWriter(record),
            td = '<td';
        //Custom
        if(column.id=="createdAt"){
      	  //console.log("createdAt ", record.created_at.date);
      	  html = record.created_at.date;
      	}
        if(column.id=="updatedAt"){
        	//  console.log("updatedAt ", record.updated_at.date);
        	  html = record.updated_at.date;
        }
        if(column.id=="action"){
      	 // console.log("show action ");
      	  html = createAction(record.id, record.uuid);
        }
        //End Custom
        if (column.hidden || column.textAlign) {
          td += ' style="';

          // keep cells for hidden column headers hidden
          if (column.hidden) {
            td += 'display: none;';
          }

          // keep cells aligned as their column headers are aligned
          if (column.textAlign) {
            td += 'text-align: ' + column.textAlign + ';';
          }

          td += '"';
        }

        if (column.cssClass) {
          td += ' class="' + column.cssClass + '"';
        }

        console.log(td + '>' + html + '</td>');
        return td + '>' + html + '</td>';
      };
    	
    </script>
</html>
