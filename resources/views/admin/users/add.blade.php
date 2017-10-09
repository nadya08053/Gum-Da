<?php

use Illuminate\Support\Facades\DB;
?>
@extends('admin.layouts.main')

@section('content')
    <script src="{{ asset('/admin/vendor/jquery/dist/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/admin/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css') }}" />

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
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li class="active">
                            <span>Add User</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                   Add User form
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
                        <form id="addUserForm" class="form-horizontal">


                            <input type="hidden" name="add" value="true">

                            <div class="form-group"><label class="col-sm-2 control-label">Name *</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="Name" id="name" name="name" class="form-control m-b">
                                    <span class="name"></span>
                                </div>
                            </div>


                            <div class="form-group">

                                <div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">Password *</label>
                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                        <input type="password" placeholder="Password" id="password" name="password" class="form-control m-b">
                                        <span class="password"></span>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                        <input type="password" placeholder="Confirm password" id="confpassword" name="confpassword" class="form-control m-b">
                                        <span class="confpassword"></span>
                                    </div>
                                </div>

                            </div>

                            {{--                            <div class="form-group"><label class="col-sm-2 control-label">Confirm password</label>


                                                        </div>--}}


                            <div class="form-group"><label class="col-sm-2 control-label">Email *</label>

                                <div class="col-sm-10">
                                    <input type="email" placeholder="Email" id="email" name="email" class="form-control m-b">
                                    <span class="email"></span>
                                </div>
                            </div>

                            <style>
                                .profileImg img{

                                    width: 100px;
                                    margin: 10px 0 10px 0;
                                }
                                .profileImg{
                                    text-align: center;
                                }
                                #allProfile{
                                    padding: 20px 0 20px 0;
                                    margin: 40px;
                                    border-bottom: 1px solid lightgrey;
                                    border-top: 1px solid lightgrey;
                                }
                            </style>

                            <div class="col-sm-12 col-md-12 col-lg-12" id="allProfile">


                                <h2>Profile</h2>

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="profileImg">
                                            <img src="/admin/images/no_avatar.png" class="img-circle m-b" alt="logo">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 col-md-3 col-lg-3 control-label">Image</label>

                                            <div class="col-sm-9 col-md-9 col-lg-9">
                                                <input type="file" id="file" name="file"  class="form-control">
                                                <span id="fileCheck"></span>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">

                                        <div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <p class="col-md-12 col-lg-12"><b>Birth Date</b></p>

                                                <div class="col-md-12 col-lg-12">
                                                    <input id="datapicker2" name="dob"  type="text" class="form-control">
                                                    <span class="datapicker2"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6">
                                                <p class="col-md-12 col-lg-12"><b>Gender</b></p>

                                                <div class="col-md-12 col-lg-12">
                                                    <select name="gender" class="form-control m-b">
                                                        <?php $selectGender = [ 'Male' => 'Male', 'Female' => 'Female'];
                                                        foreach($selectGender as $key => $val):?>
                                                        <option value="<?=$key?>"><?=$val?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="clear: both;"></div>
                                        </div>


                                        <div  class="col-md-12 col-lg-12">
                                            <p class="col-sm-12"><b>Contact number</b></p>

                                            <div class="col-sm-12">
                                                <input type="text" placeholder="Phone"  name="phone" class="form-control m-b" id="phone" maxlength="14">
                                                <span class="phone"></span>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>


                            <div class="form-group">

                                <div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">First name</label>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <input type="text" placeholder="First name" id="fname" name="fname" class="form-control m-b">
                                        <span class="fname"></span>
                                    </div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">Last name</label>
                                    <div class="col-sm-4 col-md-4 col-lg-4">

                                        <input type="text" placeholder="Last name" id="lname" name="lname" class="form-control m-b">
                                        <span class="lname"></span>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group"><label class="col-sm-2 control-label">Address 1</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="Address 1" id="street_1" name="street_1" class="form-control m-b">
                                    <span class="street_1"></span>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Address 2</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="Address 2" id="street_2" name="street_2" class="form-control m-b">
                                    <span class="street_2"></span>
                                </div>
                            </div>


                            <?php
                            $role = Auth::user()->role;
                            if($role !== 'Customer'){
                            ?>
                            <div class="form-group"><label class="col-sm-2 control-label">Trainers</label>

                                <div class="col-sm-10">
                                    <select name="trainers_id" class="form-control m-b">
                                        <option>- Select trainer -</option>
                                        <?php
                                        $trainers = DB::table('users')->select('id' , 'name')->where('role', 'trainer')->get();

                                        foreach($trainers as $val):?>
                                        <option value="<?=$val->id?>"><?=$val->name?></option>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>



                            <div class="form-group">

                                <div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">City</label>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <input type="text" placeholder="City" id="city" name="city" class="form-control m-b">
                                        <span class="city"></span>
                                    </div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">Zip</label>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <input type="number" placeholder="zip" id="zip" name="zip" class="form-control m-b">
                                        <span class="zip"></span>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group"><label class="col-sm-2 control-label">State</label>
                                <div class="col-sm-10">
                                    <select name="state" class="form-control m-b">
                                        <?php

                                        foreach($statesList as $key):?>
                                        <option value="<?=$key->stateName?>"><?=$key->stateName?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>





                            <?php $role = Auth::user()->role;
                            if($role == 'admin'){?>
                            <div class="form-group"><label class="col-sm-2 control-label">Status</label>

                                <div class="col-sm-10">
                                    <select name="deleted" class="form-control m-b">
                                        <?php $selectDeleted = [ 0 => 'Activate', 1 => 'Delete'];
                                        foreach($selectDeleted as $key => $val):?>
                                        <option value="<?=$key?>"><?=$val?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>


                            <div class="form-group"><label class="col-sm-2 control-label">Role</label>

                                <div class="col-sm-10">

                                    <select name="role" id="role" class="form-control m-b">
                                        <?php
                                        $selectRole = ['Admin','Client','Trainer','Customer'];
                                        foreach($selectRole as $val): ?>
                                        <option value="<?=$val?>"><?=$val?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                            </div>

                            <div class="facility">

                                <div id="radio">
                                </div>

                            </div>


                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn btn-primary" id="save" type="submit">Save changes</button>
                                    <button type="button" class="btn w-xs btn-info" onclick="goBack()">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style type="text/css">


        .error{
            border-color: red;
        }
        .errorSpan{
            color: red;
            font-weight: bold;
        }

    </style>

    <script src="{{ asset('/admin/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/admin/scripts/jquery.textchange.js') }}"></script>
    <script src="{{ asset('/admin/scripts/validations.js') }}"></script>


    <script>

        $(function(){
            $('#datapicker2').datepicker();



            $("form#addUserForm").submit(function(e){
            e.preventDefault();

            var formData = new FormData($(this)[0]);


            if(formData !== '') {

                $.ajax({
                    url: '/dashboard/user/add',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        //console.log(res);
                      if (res == 1) {
                            var url = "/dashboard/userslist";
                            $(location).attr('href', url);
                        }
                    },
                    error: function (res) {
                        if (res == false) console.log('Data error!');
                    }
                });
            }


          });
        });

    </script>


@stop