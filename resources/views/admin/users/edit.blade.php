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
                            <span>Edit User</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    User
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
                    <form id="editUserForm" class="form-horizontal">

                        <?php foreach($user as $items):?>

                        <input type="hidden" id="id" name="id" value="<?=$items->id?>">
                        <input type="hidden" id="edit" name="edit" value="true">

                        <div class="form-group"><label class="col-sm-2 control-label">Name *</label>

                            <div class="col-sm-10">
                                <input type="text" placeholder="Name" id="name" name="name" class="form-control m-b" value="<?=$items->name?>">
                                <span class="name"></span>
                            </div>
                        </div>


                            <div class="form-group">

                                <div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">Password *</label>
                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                            <input type="password" placeholder="Password" id="password" name="password" class="form-control m-b" value="<?=$items->password?>">
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
                                    <input type="email" placeholder="Email" id="email" name="email" class="form-control m-b" value="<?=$items->email?>">
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
                                            <?php if(!$items->img){?>
                                              <img src="/admin/images/no_avatar.png" class="img-circle m-b" alt="logo">
                                            <?php }else{?>
                                               <img src="/admin/uploads/users/<?=$items->img?>" class="img-circle m-b" alt="logo">
                                            <?php } ?>

                                            </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 col-md-3 col-lg-3 control-label">Image</label>

                                            <div class="col-sm-9 col-md-9 col-lg-9">
                                                <input type="file" id="file" name="file"  class="form-control">
                                                <span id="fileCheck"></span>
                                            </div>
                                             <div style="clear: both;"></div>
                                            <div style="text-align: right;padding: 20px 10px 0 0;">
                                                <button id="delImage" class="btn btn-danger">Delete picture</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">

                                        <div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <p class="col-md-12 col-lg-12"><b>Birth Date</b></p>

                                                    <div class="col-md-12 col-lg-12">
                                                        <input id="datapicker2" name="dob"  type="text" value="<?=$items->dob?>" class="form-control">
                                                        <span class="datapicker2"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-lg-6">
                                                    <p class="col-md-12 col-lg-12"><b>Gender</b></p>

                                                    <div class="col-md-12 col-lg-12">
                                                        <select name="gender" class="form-control m-b">
                                                            <?php $selectGender = [ 'Male' => 'Male', 'Female' => 'Female'];
                                                            foreach($selectGender as $key => $val):
                                                            if($items->gender == $key){?>
                                                            <option value="<?=$key?>" selected><?=$val?></option>
                                                            <?php }else{?>
                                                            <option value="<?=$key?>"><?=$val?></option>
                                                            <?php } ?>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <div style="clear: both;"></div>
                                            </div>


                                        <div  class="col-md-12 col-lg-12">
                                            <p class="col-sm-12"><b>Contact number</b></p>

                                            <div class="col-sm-12">
                                                <input type="text" placeholder="Phone"  name="phone" class="form-control m-b" id="phone" value="<?=$items->phone?>" maxlength="14">
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
                                        <input type="text" placeholder="First name" id="fname" name="fname" class="form-control m-b" value="<?=$items->fname?>">
                                        <span class="fname"></span>
                                    </div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">Last name</label>
                                    <div class="col-sm-4 col-md-4 col-lg-4">

                                        <input type="text" placeholder="Last name" id="lname" name="lname" class="form-control m-b" value="<?=$items->lname?>">
                                        <span class="lname"></span>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group"><label class="col-sm-2 control-label">Address 1</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="Address 1" id="street_1" name="street_1" class="form-control m-b" value="<?=$items->street_1?>">
                                    <span class="street_1"></span>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Address 2</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="Address 2" id="street_2" name="street_2" class="form-control m-b" value="<?=$items->street_2?>">
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

                                        $trainer_id = $items->trainers_id;
                                        $trainers = DB::table('users')->select('id' , 'name')->where('role', 'trainer')->get();

                                        foreach($trainers as $val):

                                          if($items->trainers_id == $val->id){?>
                                            <option value="<?=$val->id?>" selected><?=$val->name?></option>
                                          <?php }else{?>
                                            <option value="<?=$val->id?>"><?=$val->name?></option>
                                          <?php } ?>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>



                            <div class="form-group">

                                <div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">City</label>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <input type="text" placeholder="City" id="city" name="city" class="form-control m-b" value="<?=$items->city?>">
                                        <span class="city"></span>
                                    </div>
                                    <label class="col-sm-2 col-md-2 col-lg-2 control-label">Zip</label>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <input type="number" placeholder="zip" id="zip" name="zip" class="form-control m-b" value="<?=$items->zip?>">
                                        <span class="zip"></span>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group"><label class="col-sm-2 control-label">State</label>
                                <div class="col-sm-10">
                                    <select name="state" class="form-control m-b">
                                        <?php

                                        foreach($statesList as $key):
                                            if($items->state == $key->stateName){?>
                                               <option value="<?=$key->stateName?>" selected><?=$key->stateName?></option>
                                            <?php }else{?>
                                               <option value="<?=$key->stateName?>"><?=$key->stateName?></option>
                                            <?php } ?>
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
                                            foreach($selectDeleted as $key => $val):
                                            if($items->deleted == $key){?>
                                        <option value="<?=$key?>" selected><?=$val?></option>
                                           <?php }else{?>
                                        <option value="<?=$key?>"><?=$val?></option>
                                           <?php } ?>
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
                                        foreach($selectRole as $val):
                                          if($items->role == $val){
                                        ?>
                                        <option value="<?=$val?>" selected><?=$val?></option>
                                    <?php }else{?>
                                        <option value="<?=$val?>"><?=$val?></option>
                                    <?php } ?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="facility">

                                <div id="radio">
                                </div>

                            </div>

                          <?php endforeach;?>

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



        $('#delImage').click(function(e){
            e.preventDefault();
            var conf = confirm("Are you sure you want to delete?");
            var id = $('#id').val();

            if(conf == true){

                var data = {
                    deletedImg :true,
                    id:id
                };

                $.ajax({
                    url: '/dashboard/user/delete',
                    type: 'POST',
                    data: data,
                    success: function (res) {
                        //console.log(res);
                        if (res == 1) {
                            location.reload();
                        }
                    },
                    error: function (res) {
                        if (res == false) console.log('Data Error!');
                    }
                });
            }


        });


        $("#allProfile").mousemove(function(){

            if($('#fileCheck').hasClass('ok')) return false;
            var fileInput = document.getElementById("file");
            var files = fileInput.files;

            var accept = ["image/png","image/jpeg","image/gif"];

            if(files.length !== 0){
                for(var i = 0; i < accept.length;i++){
                    if(accept[i] == files[0].type){
                        $('#fileCheck').addClass('ok').html('<b style="color: green;">File format verified</b>');
                        $("form").find('button[type="submit"]').prop("disabled", false);
                        return;
                    }else{
                        $('#fileCheck').addClass('no').html('<b style="color: red;">Uploaded file is not an image</b>');
                        $("form").find('button[type="submit"]').prop("disabled", true);
                    }
                }
            }

        });



        $("form#editUserForm").submit(function(e){
            e.preventDefault();


            var formData = new FormData($(this)[0]);


            if(formData !== '') {

                $.ajax({
                    url: '/dashboard/user/update',
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
                        if (res == false) console.log('Data Error!');
                    }
                });
            }


          });
        });
    </script>

@stop