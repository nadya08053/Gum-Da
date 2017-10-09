<?php

use Illuminate\Support\Facades\DB;
?>
@extends('admin.layouts.main')

@section('content')

    <script src="{{ asset('/admin/vendor/jquery/dist/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/admin/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" />

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
                            <span>Facility List</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Facility List
                </h2>
                <small>list of all site facility</small>
            </div>
        </div>
    </div>

    <?php
    $role = Auth::user()->role;
    if($role !== 'Customer'){?>

    <div class="content" style="padding-bottom: 0;">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-body">
                        <a href="/dashboard/facility/add" class="btn btn-primary" type="button"><i class="fa fa-group"></i> <br/>Add Facility</a>

                        {{--                        <button class="btn btn-danger2" id="deletedShow" type="button"><i class="fa fa-group"></i> <br>Deleted Users</button>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>

    <div class="content" style="padding-top: 0;">

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
                        <table id="example2" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Color</th>
                                <th>logo</th>
                                <td></td>
                            </tr>
                            </thead>


                            <tbody>
                            <?php
                            foreach($list as $items):
                            ?>
                            <tr>
                                <td><?php
                                    if($items->deleted == 1){
                                        echo '<a href="/dashboard/facility/edit/'. $items->id . '" style="font-style: italic;">'. $items->name .'</a>';
                                    }else{
                                        echo '<a href="/dashboard/facility/edit/'. $items->id . '">'. $items->name .'</a>';
                                    } ?>
                                </td>
                                <td><div style=" width: 20px;height: 20px;background-color: <?=$items->color?>;"></div> </td>
                                <td>
                                    <?php if(!$items->img){?>
                                    <img style="width: 20px;height: 20px;" src="/admin/images/no_avatar.png">
                                    <?php }else{ ?>
                                        <img style="width: 20px;height: 20px;" src="/admin/uploads/users/<?=$items->img?>">
                                    <?php } ?>
                                </td>

                                <td style="text-align: center;">

                                    <?php $role = Auth::user()->role;
                                    if($role !== 'Customer'){?>
                                    <?php if($items->deleted == 0){?>
                                    <button id="<?=$items->id?>" class="btn btn-danger btn-xs">Delete</button>
                                    <a href="/dashboard/facility/view/<?=$items->id?>" class="btn btn-info btn-xs">View</a>
                                    <?php }else{ ?>
                                    <button id="<?=$items->id?>" class="btn btn-success btn-xs">Activate</button>
                                    <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>




    <script src="{{ asset('/admin/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {


            $('#deleted').hide();

            $("#deletedShow").click(function() {
                $( "#deleted" ).toggle("fast");
            });


            $("#example2 tbody").on( "click", "button", function(e) {
                e.preventDefault();


                var texts = $(this).text();
                var val = '';
                if(texts == 'Delete') {
                    var conf = confirm("Are you sure you want to delete?");
                    val = 1;
                }else{
                    var conf = confirm("Are you sure you want to activate?");
                    val = 0;
                }
                var id = $(this).attr('id');

                if(conf == true){

                    var data = {
                        id:id,
                        val:val,
                        deleted :true
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



            // Initialize Example 1
            $('#example1').dataTable( {
                "ajax": 'api/datatables.json'
            });

            // Initialize Example 2
            $('#example2').dataTable();

        });
    </script>

@stop