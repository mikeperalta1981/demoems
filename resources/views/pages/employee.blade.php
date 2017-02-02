@extends('main')

@section('title', 'CCC')

@section('css')
      <!-- Bootstrap -->
    <link href="{{ URL::asset('themes/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
    <link href="{{ URL::asset('themes/gentelella-master/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('themes/gentelella-master/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="{{ URL::asset('themes/gentelella-master/vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ URL::asset('themes/gentelella-master/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('themes/gentelella-master/build/css/custom.min.css') }}" rel="stylesheet">
    
    <style type="text/css">
      textarea {
        resize: none;
      }
    </style>

@endsection

@section('page_content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Employees <small>List of employees</small></h3>
        </div>

        <!-- <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> -->

      </div>
      
      <div class="clearfix"></div>
      <div class="row>">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="alert alert-success alert-dismissible fade in" role="alert" style="display: none" id="response-alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong id="response-success">Holy guacamole!</strong> <span id="response-success-message">Best check yo self, you're not looking too good.</span>
          </div>
        </div>
      </div>
      <div class="row">
        
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Master List <small>Employees</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                 <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                 <li><button class="btn btn-sm btn-default" data-toggle="modal" data-target="#CreateEmployeeModal"><i class="fa fa-plus"> Add</i></button></li>
              </ul>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              <!-- <p class="text-muted font-13 m-b-30">
                Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
              </p> -->
              {{-- <img class="img-responsive avatar-view" src="{{url('uploads/Koala.jpg')}}" alt="Avatar" title="Change the avatar"> --}}
              <table id="employee-list-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Dapartment</th>
                    <th>Monthly Rate</th>
                    <th>Daily Rate</th>
                    <th>Allowance</th>
                    <th>Status</th>
                    <th>Date Hired</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Employeee Modal -->
    <div id="CreateEmployeeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="employee-form" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/employee') }}"  enctype="multipart/form-data">
        <input name="profile_pic" type="hidden">  
        {{ csrf_field() }}
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <div class="modal-content modal-lg">
          
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
            </div>
            <div class="modal-body">
              <div id="employee_modal" style="padding: 5px 20px;">


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#personal-information-tab-content" id="personal-information-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal Info</a>
                      </li>
                      <li role="presentation" class=""><a href="#government-information-tab-content" role="tab" id="government-information-tab" data-toggle="tab" aria-expanded="false">Government Info</a>
                      </li>
                      <li role="presentation" class=""><a href="#contact-information-tab-content" role="tab" id="contact-information-tab" data-toggle="tab" aria-expanded="false">Contact Info</a>
                      </li>
                      <li role="presentation" class=""><a href="#employment-information-tab-content" role="tab" id="employment-information-tab" data-toggle="tab" aria-expanded="false">Employment Info</a>
                      </li>
                      <li role="presentation" class=""><a href="#other-information-tab-content" role="tab" id="other-information-tab" data-toggle="tab" aria-expanded="false">Other Info</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                    {{-- Personal Information --}}
                      <div role="tabpanel" class="tab-pane fade active in" id="personal-information-tab-content" aria-labelledby="personal-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control">
                              <option value="MR">MR</option>
                              <option value="MS">MS</option>
                              <option value="MRS">MRS</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Firstname">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middlename" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="middlename" class="form-control col-md-7 col-xs-12" type="text" name="middlename" placeholder="Middle Name / Initial">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Lastname">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="suffix">Suffix</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="suffix" id="suffix">
                              <option value=""></option>
                              <option value="JR">JUNIOR</option>
                              <option value="SR">SENIOR</option>
                              <option value="II">II</option>
                              <option value="III">III</option>
                              <option value="IV">IV</option>
                              <option value="V">V</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p>
                              M:<input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> 
                              F:<input type="radio" class="flat" name="gender" id="genderF" value="F" />
                            </p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3" for="birthday">Birthday</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" data-inputmask="'mask': '9999-99-99'" name="birthday" id="birthday">
                            <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="civil-status">Civil Status</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="civil_status" id="civil-status">
                              <option value="SINGLE">SINGLE</option>
                              <option value="MARRIED">MARRIED</option>
                              <option value="WIDOWED">WIDOWED</option>
                              <option value="SEPARATED">SEPARATED</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="citizenship">Citizenship
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="citizenship" class="form-control col-md-7 col-xs-12" id="citizenship" placeholder="Citizenship">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="educational-attainment">Educational Attainment</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="educational_attainment" id="educational-attainment">
                              <option value=""></option>
                              <option value="HIGH SCHOOL">HIGH SCHOOL</option>
                              <option value="COLLEGE">COLLEGE</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course">Course
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="course" name="course" class="form-control col-md-7 col-xs-12" placeholder="Course ">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school">School
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="school" name="school" class="form-control col-md-7 col-xs-12" placeholder="School ">
                          </div>
                        </div>
                      </div>
                      {{-- Government Information --}}
                      <div role="tabpanel" class="tab-pane fade" id="government-information-tab-content" aria-labelledby="government-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tin">Tax Identification No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="tin" name="tin" class="form-control col-md-7 col-xs-12" placeholder="TIN ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax-code">Tax Code
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="tax-code" name="tax_code" class="form-control col-md-7 col-xs-12" placeholder="Tax Code ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sss">SSS No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="sss" name="sss" class="form-control col-md-7 col-xs-12" placeholder="SSS ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pag-ibig">Pag Ibig No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="pag-ibig" name="pag_ibig" class="form-control col-md-7 col-xs-12" placeholder="Pag Ibig No. ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="philhealth">Philhealth No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="philhealth" name="philhealth" class="form-control col-md-7 col-xs-12" placeholder="Philhealth No. ">
                          </div>
                        </div>

                      </div>
                      {{-- Contact Information --}}
                      <div role="tabpanel" class="tab-pane fade" id="contact-information-tab-content" aria-labelledby="contact-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permanent-address">Permanent Address
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="3" placeholder="Permanent Address" name="permanent_address" id="permanent-address"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current-address">Current Address
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="3" placeholder="Permanent Address" name="current_address" id="current-address"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone-no">Phone No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="phone-no" name="phone_no" class="form-control col-md-7 col-xs-12" placeholder="Phone No. ">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="spouse-name">Spouse Name
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="spouse-name" name="spouse_name" class="form-control col-md-7 col-xs-12" placeholder="Spouse Name ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact-name">Emergency Contact Name
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="contact-name" name="contact_name" class="form-control col-md-7 col-xs-12" placeholder="Emergency Contact Name ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact-relationship">Contact Relationship
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="contact-relationship" name="contact_relationship" class="form-control col-md-7 col-xs-12" placeholder="Contact Relationship ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact-phone">Contact Phone No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="contact-phone" name="contact_phone" class="form-control col-md-7 col-xs-12" placeholder="Contact Phone NO. ">
                          </div>
                        </div>
                      </div>
                      {{-- Employment Information --}}
                      <div role="tabpanel" class="tab-pane fade" id="employment-information-tab-content" aria-labelledby="employment-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employment-status">Employment Status</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="employment_status" id="employment-status">
                              <option value="PROBATION">PROBATIONARY</option>
                              <option value="REGULAR">REGULAR</option>
                              <option value="RETIRED">RETIRED</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monthly-salary">Monthly Salary
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="monthly-salary" name="monthly_salary" class="form-control col-md-7 col-xs-12" placeholder="Monthly Salary ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="daily-rate">Daily Rate
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="daily-rate" name="daily_rate" class="form-control col-md-7 col-xs-12" placeholder="Daily Rate ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="allowance">Allowance
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="allowance" name="allowance" class="form-control col-md-7 col-xs-12" placeholder="Allowance ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="position" id="position">
                              <option value="CASHIER">CASHIER</option>
                              <option value="SECRETARY">SECRETARY</option>
                              <option value="FINANCIAL COUNCELOR">FINANCIAL COUNCELOR</option>
                              <option value="MANAGER">MANAGER</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="department" name="department" class="form-control col-md-7 col-xs-12" placeholder="Department ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3" for="date-hired">Date Hired</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" data-inputmask="'mask': '9999-99-99'" name="date_hired" id="date-hired">
                            <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                          </div>
                        </div>
                      </div>
                      
                      <div role="tabpanel" class="tab-pane fade" id="other-information-tab-content" aria-labelledby="other-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile-picture">Profile Picture <span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <div id="add_picture" class="dropzone" style="min-height: 160px;"></div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
               
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-save antosubmit" data-loading-text="Saving">Save changes</button>
          </div>
        </div>
        </form>
      </div>

    </div>


    <!-- Edit Employeee Modal -->
    <div id="EditEmployeeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog">
        <form id="edit-employee-form" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/employee/update') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id">
        <input type="hidden" name="profile_pic">
        <div class="modal-content modal-lg">
          
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel1">Edit Employee</h4>
            </div>
            <div class="modal-body">
              <div id="edit-employee_modal" style="padding: 5px 20px;">


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab1" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#edit-personal-information-tab-content" id="edit-personal-information-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal Information</a>
                      </li>
                      <li role="presentation" class=""><a href="#edit-government-information-tab-content" role="tab" id="edit-government-information-tab" data-toggle="tab" aria-expanded="false">Government Information</a>
                      </li>
                      <li role="presentation" class=""><a href="#edit-contact-information-tab-content" role="tab" id="edit-contact-information-tab" data-toggle="tab" aria-expanded="false">Contact Information</a>
                      </li>
                      <li role="presentation" class=""><a href="#edit-employment-information-tab-content" role="tab" id="edit-employment-information-tab" data-toggle="tab" aria-expanded="false">Employment Information</a>
                      </li>
                      <li role="presentation" class=""><a href="#edit-other-information-tab-content" role="tab" id="edit-other-information-tab" data-toggle="tab" aria-expanded="false">Other Info</a>
                      </li>
                    </ul>
                    <div id="myTabContent1" class="tab-content">
                    {{-- Personal Information --}}
                      <div role="tabpanel" class="tab-pane fade active in" id="edit-personal-information-tab-content" aria-labelledby="personal-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control">
                              <option value="MR">MR</option>
                              <option value="MS">MS</option>
                              <option value="MRS">MRS</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-firstname">First Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Firstname">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="edit-middlename" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="edit-middlename" class="form-control col-md-7 col-xs-12" type="text" name="middlename" placeholder="Middle Name / Initial">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-lastname">Last Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Lastname">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-suffix">Suffix</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="suffix" id="edit-suffix">
                              <option value=""></option>
                              <option value="JR">JUNIOR</option>
                              <option value="SR">SENIOR</option>
                              <option value="II">II</option>
                              <option value="III">III</option>
                              <option value="IV">IV</option>
                              <option value="V">V</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p>
                              M:<input type="radio" class="flat" name="gender" id="edit-genderM" value="M" checked="" required /> 
                              F:<input type="radio" class="flat" name="gender" id="edit-genderF" value="F" />
                            </p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3" for="edit-birthday">Birthday</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" data-inputmask="'mask': '9999-99-99'" name="birthday" id="edit-birthday">
                            <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-civil_status">Civil Status</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="civil_status" id="edit-civil_status">
                              <option value="SINGLE">SINGLE</option>
                              <option value="MARRIED">MARRIED</option>
                              <option value="WIDOWED">WIDOWED</option>
                              <option value="SEPARATED">SEPARATED</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-citizenship">Citizenship
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="citizenship" class="form-control col-md-7 col-xs-12" id="edit-citizenship" placeholder="Citizenship">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-educational_attainment">Educational Attainment</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="educational_attainment" id="edit-educational_attainment">
                              <option value=""></option>
                              <option value="HIGH SCHOOL">HIGH SCHOOL</option>
                              <option value="COLLEGE">COLLEGE</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-course">Course
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-course" name="course" class="form-control col-md-7 col-xs-12" placeholder="Course ">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-school">School
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-school" name="school" class="form-control col-md-7 col-xs-12" placeholder="School ">
                          </div>
                        </div>
                      </div>
                      {{-- Government Information --}}
                      <div role="tabpanel" class="tab-pane fade" id="edit-government-information-tab-content" aria-labelledby="government-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-tin">Tax Identification No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-tin" name="tin" class="form-control col-md-7 col-xs-12" placeholder="TIN ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-tax-code">Tax Code
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="tax-code" name="tax_code" class="form-control col-md-7 col-xs-12" placeholder="Tax Code ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sss">SSS No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="sss" name="sss" class="form-control col-md-7 col-xs-12" placeholder="SSS ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-pag-ibig">Pag Ibig No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-pag-ibig" name="pag_ibig" class="form-control col-md-7 col-xs-12" placeholder="Pag Ibig No. ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-philhealth">Philhealth No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-philhealth" name="philhealth" class="form-control col-md-7 col-xs-12" placeholder="Philhealth No. ">
                          </div>
                        </div>

                      </div>
                      {{-- Contact Information --}}
                      <div role="tabpanel" class="tab-pane fade" id="edit-contact-information-tab-content" aria-labelledby="contact-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-permanent-address">Permanent Address
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="3" placeholder="Permanent Address" name="permanent_address" id="edit-permanent-address"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-current-address">Current Address
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="3" placeholder="Permanent Address" name="current_address" id="edit-current-address"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-phone-no">Phone No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-phone-no" name="phone_no" class="form-control col-md-7 col-xs-12" placeholder="Phone No. ">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-spouse-name">Spouse Name
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-spouse-name" name="spouse_name" class="form-control col-md-7 col-xs-12" placeholder="Spouse Name ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-contact-name">Emergency Contact Name
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-contact-name" name="contact_name" class="form-control col-md-7 col-xs-12" placeholder="Emergency Contact Name ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-contact-relationship">Contact Relationship
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-contact-relationship" name="contact_relationship" class="form-control col-md-7 col-xs-12" placeholder="Contact Relationship ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-contact-phone">Contact Phone No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-contact-phone" name="contact_phone" class="form-control col-md-7 col-xs-12" placeholder="Contact Phone NO. ">
                          </div>
                        </div>
                      </div>
                      {{-- Employment Information --}}
                      <div role="tabpanel" class="tab-pane fade" id="edit-employment-information-tab-content" aria-labelledby="employment-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-employment-status">Employment Status</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="employment_status" id="edit-employment-status">
                              <option value="PROBATION">PROBATIONARY</option>
                              <option value="REGULAR">REGULAR</option>
                              <option value="RETIRED">RETIRED</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-monthly-salary">Monthly Salary
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-monthly-salary" name="monthly_salary" class="form-control col-md-7 col-xs-12" placeholder="Monthly Salary ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-daily-rate">Daily Rate
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-daily-rate" name="daily_rate" class="form-control col-md-7 col-xs-12" placeholder="Daily Rate ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-allowance">Allowance
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-allowance" name="allowance" class="form-control col-md-7 col-xs-12" placeholder="Allowance ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-position">Position</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="position" id="edit-position">
                              <option value="CASHIER">CASHIER</option>
                              <option value="SECRETARY">SECRETARY</option>
                              <option value="FINANCIAL COUNCELOR">FINANCIAL COUNCELOR</option>
                              <option value="MANAGER">MANAGER</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-department">Department
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-department" name="department" class="form-control col-md-7 col-xs-12" placeholder="Department ">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3" for="edit-date-hired">Date Hired</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" data-inputmask="'mask': '9999-99-99'" name="date_hired" id="edit-date-hired">
                            <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="edit-other-information-tab-content" aria-labelledby="edit-other-information-tab">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-profile-picture">Profile Picture <span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <div id="edit_picture" class="dropzone" style="min-height: 160px;"></div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
               
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-update antosubmit" data-loading-text="Updating">Save changes</button>
          </div>
        </div>
        </form>
      </div>

    </div>

    
    <!-- Profile Modal -->
    <div id="ProfileModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Employee Profile</h4>
          </div>
          
          <div class="modal-body">
              <div class="clearfix"></div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    {{-- <div class="x_title">
                      <h2>User Report <small>Activity report</small></h2>
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
                    </div> --}}
                    <div class="x_content">
                      <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                          <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img class="img-responsive avatar-view" src="" alt="Avatar" title="Change the avatar">
                          </div>
                        </div>
                        <h3 id='profile_employee_name'>Samuel Doe</h3>

                        <ul class="list-unstyled user_data">
                          <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                          </li>

                          <li>
                            <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                          </li>

                          <li class="m-top-xs">
                            <i class="fa fa-external-link user-profile-icon"></i>
                            <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                          </li>
                        </ul>

                        <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        <br />

                        <!-- start skills -->
                        <h4>Skills</h4>
                        <ul class="list-unstyled user_data">
                          <li>
                            <p>Web Applications</p>
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                            </div>
                          </li>
                          <li>
                            <p>Website Design</p>
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                            </div>
                          </li>
                          <li>
                            <p>Automation & Testing</p>
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                            </div>
                          </li>
                          <li>
                            <p>UI / UX</p>
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                            </div>
                          </li>
                        </ul>
                        <!-- end of skills -->

                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-12">

                        <div class="profile_title">
                          <div class="col-md-6">
                            <h2>User Activity Report</h2>
                          </div>
                          <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                              <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                          </div>
                        </div>
                        <!-- start of user-activity-graph -->
                        <div id="graph_bar" style="width:100%; height:280px;"></div>
                        <!-- end of user-activity-graph -->

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                            </li>
                          </ul>
                          <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                              <!-- start recent activity -->
                              <ul class="messages">
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                      <span class="fs1" aria-hidden="true" data-icon=""></span>
                                      <a href="#" data-original-title="">Download</a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                      <span class="fs1" aria-hidden="true" data-icon=""></span>
                                      <a href="#" data-original-title="">Download</a>
                                    </p>
                                  </div>
                                </li>

                              </ul>
                              <!-- end recent activity -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                              <!-- start user projects -->
                              <table class="data table table-striped no-margin">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Client Company</th>
                                    <th class="hidden-phone">Hours Spent</th>
                                    <th>Contribution</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">18</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>New Partner Contracts Consultanci</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">13</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Partners and Inverstors report</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">30</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">28</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <!-- end user projects -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                              <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                photo booth letterpress, commodo enim craft beer mlkshk </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>


@endsection


@section('scripts')

     <script src="{{ URL::asset('themes/gentelella-master/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ URL::asset('themes/gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('themes/gentelella-master/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ URL::asset('themes/gentelella-master/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Dropzone.js -->
    <script src="{{ URL::asset('themes/gentelella-master/vendors/dropzone/dist/min/dropzone.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ URL::asset('themes/gentelella-master/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- jquery.inputmask -->
    <script src="{{ URL::asset('themes/gentelella-master/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    
   <!-- Datatables -->
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    
    <!-- bootstrap-daterangepicker -->
    <script src="{{ URL::asset('themes/gentelella-master/production/js/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset('themes/gentelella-master/production/js/datepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ URL::asset('themes/gentelella-master/build/js/custom.min.js') }}"></script>
   
    <script>
      
      Dropzone.autoDiscover = false;

      Dropzone.options.addPicture = {
          headers: {
              'X-CSRF-Token': $('input[name="_token"]').val()
          },
          paramName: "file", // The name that will be used to transfer the file
          maxFiles: 1,
          maxFilesize: 2, // MB
          parallelUploads: 2, //limits number of files processed to reduce stress on server
          addRemoveLinks: true,
          //autoProcessQueue: false,
          accept: function(file, done) {
              // TODO: Image upload validation
              //console.log(file.name);

              //$('input[name=profile_pic]').val(file.name);
              done();
          },
          sending: function(file, xhr, formData) {
              // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
              //formData.append("_token", $('[name=_token').val()); // Laravel expect the token post value to be named _token by default
          },
          init: function() {
            
              this.on("success", function(file, response) {
                //console.log(response);
                $('input[name=profile_pic]').val(response);
                  // On successful upload do whatever :-)
              });
              this.on("maxfilesexceeded", function(file){
                this.removeAllFiles();
                this.addFile(file);
              });
          }
      };

      // Manually init dropzone on our element.
      var AddImageDropzone = new Dropzone("#add_picture", {
          url: '{{ url('/employee/postPicture') }}'
      });


      /*edit dropzone pic*/
      Dropzone.options.editPicture = {
          headers: {
              'X-CSRF-Token': $('input[name="_token"]').val()
          },
          paramName: "file", // The name that will be used to transfer the file
          maxFiles: 1,
          maxFilesize: 2, // MB
          parallelUploads: 2, //limits number of files processed to reduce stress on server
          addRemoveLinks: true,
          accept: function(file, done) {
              // TODO: Image upload validation
              done();
          },
          sending: function(file, xhr, formData) {
              // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
              //formData.append("_token", $('[name=_token').val()); // Laravel expect the token post value to be named _token by default
          },
          init: function() {
              this.on("success", function(file, response) {
                  // On successful upload do whatever :-)
                   $('input[name=profile_pic]').val(response);
              });
               this.on("maxfilesexceeded", function(file){
                this.removeAllFiles();
                this.addFile(file);
              });
          }
      };

      var EditImageDropzone = new Dropzone("#edit_picture", {
          url: '{{ url('/employee/postPicture') }}'
      });


      


      $(document).ready(function(){

         var $table = $('#employee-list-table').DataTable({
              "ajax": "/employee/getList",
              "columns": [
                  { "data": "name" },
                  { "data": "position" },
                  { "data": "department" },
                  { "data": "monthly_salary" },
                  { "data": "daily_rate" },
                  { "data": "allowance" },
                  { "data": "employment_status" },
                  { "data": "date_hired" },
                  { "data": "action" },
              ]
          } );

          $(":input").inputmask();


        $('#employee-form').submit(function(e){
          e.preventDefault();
          $.ajaxSetup({
              header:$('meta[name="_token"]').attr('content')
          })

          $btn_save = $('.btn-save');         
          $btn_save.button('loading');

           $.ajax({

                type:"POST",
                url:'/employee',
                data:$(this).serialize(),
                dataType: 'json',
                success: function(data){
                  $btn_save.button('reset')
                    if(data.success){
                      $('#response-success').html('<i class="fa fa-check"></i> Success!!!');
                      $('#response-success-message').html(data.message);


                      $('#CreateEmployeeModal').modal('hide');
                      $('#response-alert').show();

                      $table.ajax.reload();
                    }
                },
                error: function(data){
                  
                }
            })
        });

        $('#edit-employee-form').submit(function(e){
          e.preventDefault();
          $.ajaxSetup({
              header:$('meta[name="_token"]').attr('content')
          })

          var $btn_save = $('.btn-update')
                $data = new FormData($("#edit_employee_form")[0] );       
          $btn_save.button('loading');
          
           $.ajax({
                type:"POST",
                url:'/employee/update',
                data:$(this).serialize(),
                //data: $data,
                //processData: false,
                //contentType: false,
                dataType: 'json',
                success: function(data){
                  $btn_save.button('reset')
                    if(data.success){
                      $('#response-success').html('<i class="fa fa-check"></i> Success!!!');
                      $('#response-success-message').html(data.message);


                      $('#EditEmployeeModal').modal('hide');
                      $('#response-alert').show();

                      $table.ajax.reload();

                    }

                },
                error: function(data){
                  
                }
            })
        });

        var mockFile = { name: "Filename", size: 12345 };
        var $basepath = "{{url('/uploads')}}";

         $('#employee-list-table tbody').on( 'click', 'button.edit', function () {
            var data = $table.row( $(this).parents('tr') ).data();
            var $arrdata = [];
            EditImageDropzone.removeAllFiles();
            $('#EditEmployeeModal').modal('show');
            
            $('#EditEmployeeModal').one('shown.bs.modal', function () {
              
              $.each(data, function(obj, ele){
                if($('#edit-employee-form input[name="' + obj + '"]').length){
                  $('#edit-employee-form input[name="' + obj + '"]').val(ele);  
                }
                if($('#edit-employee-form input:radio[name="' + obj + '"]').length){
                  $('#edit-gender' + ele).iCheck('check');
                }
                if($('#edit-employee-form select[name="' + obj + '"]').length){
                  $('#edit-employee-form select[name="' + obj + '"]').val(ele);  
                }

                 if($('#edit-employee-form textarea[name="' + obj + '"]').length){
                  $('#edit-employee-form textarea[name="' + obj + '"]').val(ele);  
                }

                $arrdata[obj] = ele;
                //console.log($profile_pic);
              })
              
              
              var $pic_url = $arrdata.profile_pic;
               
              $path = $basepath + "/" + $pic_url;
              
              //$('myOjbect').css('background-image', 'url(' + imageUrl + ')');


              EditImageDropzone.emit("addedfile", mockFile);
              EditImageDropzone.createThumbnailFromUrl(mockFile, $path);
              EditImageDropzone.emit("complete", mockFile);

            })

             
            //alert($profile_pic); 
           
            // Create the mock file:
            //var mockFile = { name: "Filename", size: 12345 };

            // Call the default addedfile event handler
            //EditImageDropzone.emit("addedfile", mockFile);

            // And optionally show the thumbnail of the file:
            //EditImageDropzone.emit("thumbnail", mockFile, "/image/url");
            // Or if the file on your server is not yet in the right
            // size, you can let Dropzone download and resize it
            // callback and crossOrigin are optional.
            

            /*EditImageDropzone.createThumbnailFromUrl(mockFile, {{-- url('/upload/' . $profile_pic)  --}});*/

            // Make sure that there is no progress bar, etc...
            //EditImageDropzone.emit("complete", mockFile);  


        } );


        $('#CreateEmployeeModal').on('shown.bs.modal', function () {
            $('#employee-form')[0].reset();
            AddImageDropzone.removeAllFiles();
        })

        $('#EditEmployeeModal').on('hidden.bs.modal', function () {
          EditImageDropzone.files.push( mockFile ); 
          EditImageDropzone.removeAllFiles( true );            
        })




      })

    
      function view_profile($this){
        var $id = $($this).data('id');

        $('#ProfileModal').modal('show');

        $('#ProfileModal').one('shown.bs.modal', function(){

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          })


           $.ajax({
                  type:"POST",
                  url:'/employee/showProfile',
                  data: {'id': $id
                  },
                  //data: $data,
                  //processData: false,
                  //contentType: false,
                  dataType: 'json',
                  success: function(data){
                    var $data = data['data']
                    
                    $(".avatar-view").attr("src", 'uploads/' + $data.profile_pic);
                    $('#profile_employee_name').html($data.firstname + ' ' + $data.middlename + ' ' + $data.lastname + ' ' + $data.suffix);
                   /* $btn_save.button('reset')
                      if(data.success){
                        $('#response-success').html('<i class="fa fa-check"></i> Success!!!');
                        $('#response-success-message').html(data.message);


                        $('#EditEmployeeModal').modal('hide');
                        $('#response-alert').show();

                        $table.ajax.reload();

                      }*/

                  },
                  error: function(data){
                    
                  }
              })
          })
      }


    


    
    </script>
    <!-- /gauge.js -->
@endsection






