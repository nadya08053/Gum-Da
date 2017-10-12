<?php

use Illuminate\Support\Facades\DB;

$selectRole = ['Admin','Client','Trainer','Customer'];
$selectGender = [ 'Male' => 'Male', 'Female' => 'Female'];
$selectDeleted = [ 0 => 'Activate', 1 => 'Delete'];
$role = Auth::user()->role;
?>

@extends('admin.layouts.main')

@section('content')

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action" href="#">
                    <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                </a>

                <div id="hbreadcrumb" class="pull-right m-t-lg">
                    <ol class="hbreadcrumb breadcrumb">
                        <li><a href="{{ url('/') }}/dashboard">Dashboard</a></li>
                        <li><a href="{{ url('/') }}/dashboard/userslist">Users</a></li>
                        <li class="active">
                            <span>{{ $title }} User</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    {{ $title }} User
                </h2>
                <small>* Enter all required fields</small>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                            <a class="closebox"><i class="fa fa-times"></i></a>
                        </div>
                        &nbsp;
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <form action="{{ $action }}" method="post" id="add-edit-form" enctype="multipart/form-data">

                                    @if ( $title == 'Edit' )
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                    @endif

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label class="control-label">Username*</label>
                                            <p><i>8 - 16 characters</i></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Username" value="{{ $user->name or old('name') }}" autofocus>
                                            <span class="name"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label class="control-label">Password*</label>
                                            <p><i>8 - 16 letter, numbers</i></p>
                                        </div>
                                        <div class="col-sm-4">
                                            @if ( $title == 'Edit' )
                                                <input type="password" placeholder="Password" name="password" class="form-control m-b">
                                            @else
                                                <input type="password" placeholder="Password" id="password" name="password" class="form-control m-b">
                                            @endif
                                            <span class="password"></span>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <input type="password" placeholder="Confirm password" id="confpassword" name="confpassword" class="form-control m-b">
                                            <span class="confpassword"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label class="control-label">Email*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="email" placeholder="Email" id="email" name="email" class="form-control m-b" value="{{ $user->email or old('email') }}">
                                            <span class="email"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="control-label">Profile</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="profile-info">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="user-add-avatar">
                                                            @if ( $title == 'Edit' && $user->img )
                                                                <img src="{{ url('/') }}/admin/uploads/users/{{ $user->img }}" class="img-circle m-b" alt="avatar">
                                                            @else
                                                                <img src="{{ url('/') }}/admin/images/no_avatar.png" class="img-circle m-b" alt="avatar">
                                                            @endif
                                                            <img src="{{ url('/') }}/admin/images/upload.png" class="img-upload" alt="avatar">
                                                            <input type="file" id="file" name="file" class="form-control">
                                                        </div>
                                                        <span id="fileCheck"></span>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <label class="control-label">Birth Date</label>
                                                                <input type="hidden" name="dob" id="dob" value="{{ $user->dob or old('dob') }}">
                                                                <div class="row" id="dete-of-birth">
                                                                    <div class="col-sm-4">
                                                                        <select id="years" class="form-control">
                                                                            <?php for($i = date('Y') ; $i >= date('Y', strtotime('-100 years')); $i--){ ?>
                                                                                <option value='{{ $i }}' {{ ( $title == 'Edit' && $user->dob && explode('/', $user->dob)[2] == $i )?'selected':'' }}>{{ $i }}</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <select id="months" class="form-control">
                                                                            <?php for($i = 1; $i <= 12; $i++){$i = str_pad($i, 2, 0, STR_PAD_LEFT); $month = date('M', strtotime('2012-' . $i . '-01'));;?>
                                                                                <option value='{{ $i }}' {{ ( $title == 'Edit' && $user->dob && explode('/', $user->dob)[1] == $i )?'selected':'' }}>{{ $month }}</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <select id="days" class="form-control">
                                                                            <?php for($i = 1; $i <= 31; $i++){$i = str_pad($i, 2, 0, STR_PAD_LEFT); ?>
                                                                                <option value='{{ $i }}' {{ ( $title == 'Edit' && $user->dob &&  explode('/', $user->dob)[0] == $i )?'selected':'' }}>{{ $i }}</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="control-label">Gender</label>
                                                                <select name="gender" class="form-control m-b">
                                                                    @foreach ( $selectGender as $key => $val )
                                                                        <option value="{{ $key }}" {{ ( $title == 'Edit' && $user->gender == $key )?'selected':'' }}>{{ $val }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label class="control-label">Contact number</label>
                                                                <input type="text" placeholder="Phone"  name="phone" class="form-control m-b" id="phone" maxlength="14" value="{{ $user->phone or old('phone') }}">
                                                                <span class="phone"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="First name" id="fname" name="fname" class="form-control m-b" value="{{ $user->fname or old('fname') }}">
                                                        <span class="fname"></span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="Last name" id="lname" name="lname" class="form-control m-b" value="{{ $user->lname or old('lname') }}">
                                                        <span class="lname"></span>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="text" placeholder="Address 1" id="street_1" name="street_1" class="form-control m-b" value="{{ $user->street_1 or old('street_1') }}">
                                                        <span class="street_1"></span>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="text" placeholder="Address 2" id="street_2" name="street_2" class="form-control m-b" value="{{ $user->street_2 or old('street_2') }}">
                                                        <span class="street_2"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="City" id="city" name="city" class="form-control m-b" value="{{ $user->city or old('city') }}">
                                                        <span class="city"></span>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select name="state" class="form-control m-b">
                                                            <option value="">State</option>
                                                            @foreach ( $statesList as $key )
                                                                <option value="{{ $key->stateName }}" {{ ( $title == 'Edit' && $user->state == $key->stateName )?'selected':'' }}>{{ $key->stateName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="number" placeholder="zip" id="zip" name="zip" class="form-control m-b" value="{{ $user->zip or old('zip') }}">
                                                        <span class="zip"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    @if ( $role == 'Admin' )
                                        <div class="row m-b">
                                            <div class="col-sm-3">
                                                <label class="control-label">Status</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="radio" name="deleted" value="0" {{ ($title == 'Edit' && $user->deleted == 0)?'checked':'' }} id="is-active">
                                                        <label for="is-active" class="text-uppercase">Active</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" name="deleted" value="1" {{ ($title == 'Edit' && $user->deleted == 1)?'checked':'' }} id="not-active">
                                                        <label for="not-active" class="text-uppercase">Not active</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row m-b">
                                        <div class="col-sm-3">
                                            <label class="control-label">Role*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select name="role" id="role" class="form-control m-b">
                                                @foreach ( $selectRole as $val )
                                                    <option value="{{ $val }}"  {{ ( $title == 'Edit' && $user->role == $val )?'selected':'' }}>{{ $val }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row m-b" id="select-facility" style="{{ ($title == 'Edit' && $user->role != 'Admin')?'display:block':'display:none' }}">
                                        <div class="col-sm-3">
                                            <label class="control-label">Facility</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select name="facility_id" id="facility" class="form-control m-b">
                                                <option value="">Select facility</option>
                                                @foreach ( $selectFacility as $val )
                                                    <option value="{{ $val->id }}" {{ ($title == 'Edit' && $user->facility_id == $val->id)?'selected':'' }}>{{ $val->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row m-b" id="select-trainer" style="{{ ($title == 'Edit' && $user->role == 'Customer')?'display:block':'display:none' }}">
                                        <div class="col-sm-3">
                                            <label class="control-label">Trainer</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select name="trainer_id" class="form-control m-b">
                                                <option value="">Select trainer</option>
                                                @foreach ( $selectTrainer as $val )
                                                    <option value="{{ $val->id }}" {{ ($title == 'Edit' && $user->trainer_id == $val->id)?'selected':'' }}>{{ $val->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button class="btn btn-primary" id="save" type="submit">Save changes</button>
                                            <a href="{{ url('/') }}/dashboard/userslist" class="btn w-xs btn-info">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/admin/scripts/jquery.textchange.js') }}"></script>
    <script src="{{ asset('/admin/scripts/validations.js') }}"></script>

    <script>
        $(function(){
            $('#role').change(function(){
                var role = $(this).val();
                if (role == "Client" || role == "Trainer")  {
                    $('#select-trainer').hide();
                    $('#select-facility').fadeIn();
                } else if (role == "Customer") {
                    $('#select-facility').fadeIn();
                } else {
                    $('#select-trainer').fadeOut();
                    $('#select-facility').fadeOut();
                }
            });
            $('#facility').change(function(){
                var role = $('#role').val();
                var facility = $(this).val();
                if (role == "Customer") {
                    $('#select-trainer').fadeIn();
                }
            });
            $('#dete-of-birth select').each(function(){
                $(this).change(function(){
                    var year = $('#years').val();
                    var month = $('#months').val();
                    var day = $('#days').val();
                    var dob = day+'/'+month+'/'+year;
                    $('#dob').val(dob);
                });
            });
        });
    </script>
@stop
