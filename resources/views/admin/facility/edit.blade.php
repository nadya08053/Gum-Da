<?php

use Illuminate\Support\Facades\DB;
?>

@extends('admin.layouts.main')

@section('content')


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
                            <span>Edit facility</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Facility
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
                        <form id="myForm" class="form-horizontal">

                            <?php foreach($facility as $items):?>

                            <input type="hidden" id="id" name="id" value="<?=$items->id?>">

                            <div class="form-group"><label class="col-sm-2 control-label">Name *</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="Name" id="name" name="name" class="form-control m-b" value="<?=$items->name?>">
                                    <span class="name"></span>
                                </div>
                            </div>



                                <link rel="stylesheet" href="{{ asset('/admin/scripts/colorpicker/css/colorpicker.css') }}" />


                                <div class="form-group" style="margin: 60px 0 60px 0;position: relative;">
                                    <label class="col-sm-2 control-label">Color *</label>

                                    <style>
                                        .dbColor{
                                            width: 32px;height:30px;border: 3px solid #DCDCDC;border-radius: 5px;padding: 3px;
                                        }

                                    </style>

                                    <div class="col-sm-1">
                                    <div class="dbColor" style="background-color: <?=$items->color?>;"></div>
                                    </div>

                                    <div id="customWidget"  class="col-sm-6">
                                        <div id="colorSelector2"><div style="background-color: #00ff00"></div></div>
                                        <div id="colorpickerHolder2">
                                        </div>
                                    </div>
                                    <input type="hidden" id="color" name="color" value="">
                                </div>

                                <script src="{{ asset('/admin/scripts/colorpicker/js/jquery.js') }}"></script>
                                <script src="{{ asset('/admin/scripts/colorpicker/js/colorpicker.js') }}"></script>
                                <script src="{{ asset('/admin/scripts/colorpicker/js/eye.js') }}"></script>
                                <script src="{{ asset('/admin/scripts/colorpicker/js/utils.js') }}"></script>
                                <script src="{{ asset('/admin/scripts/colorpicker/js/layout.js') }}"></script>



                            <style>
                                .profileImg img{

                                    width: 100px;
                                    margin: 10px 0 10px 0;
                                }
                                .profileImg{
                                    text-align: center;
                                }

                            </style>

                            <div class="col-sm-12 col-md-12 col-lg-12" id="allProfile">


                                        <div class="profileImg">
                                            <?php if(!$items->img){?>
                                            <img src="/admin/images/no_avatar.png" class="img-circle m-b" alt="logo">
                                            <?php }else{?>
                                            <img src="/admin/uploads/users/<?=$items->img?>" class="img-circle m-b" alt="logo">
                                            <?php } ?>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-md-2 col-lg-2 control-label">Image</label>

                                            <div class="col-sm-10 col-md-10 col-lg-10">
                                                <input type="file" id="file" name="file"  class="form-control">
                                                <span id="fileCheck"></span>
                                            </div>
                                            <div style="clear: both;"></div>
                                            <div style="text-align: right;padding: 20px 30px 0 0;">
                                                <button id="delImage" class="btn btn-danger">Delete picture</button>
                                            </div>
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
    <script src="{{ asset('/admin/vendor/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('/admin/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/admin/scripts/jquery.textchange.js') }}"></script>
    <script src="{{ asset('/admin/scripts/fileCheck.js') }}"></script>



    <script>

        $(function(){
            $('#datapicker2').datepicker();


        $("#save").mousemove(function () {
            var bg = $("#colorSelector2 div").css("backgroundColor");
            var bgColor = $(".dbColor").css("backgroundColor");
            if(bg !== 'rgb(0, 255, 0)') {
                $('#color').val(bg);
            }else{
                $('#color').val(bgColor);
            }
        });


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
                    url: '/dashboard/facility/delete',
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


         $("form#myForm").submit(function(e){
            e.preventDefault();


            var formData = new FormData($(this)[0]);


            if(formData !== '') {

                $.ajax({
                    url: '/dashboard/facility/update',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        //console.log(res);
                        if (res == 1) {
                            var url = "/dashboard/facility";
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