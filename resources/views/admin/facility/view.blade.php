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
                            <span>Facility Users List</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Facility users list
                </h2>
                <small>list of all facility users</small>
            </div>
        </div>
    </div>


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
                                <th>Email</th>
                                <th>Created</th>
                                <th>Phone</th>
                                <td></td>
                            </tr>
                            </thead>


                            <tbody>
                            <?php
                            foreach($users_id as $item):

                                   $id = $item->users_id;
                            $user = DB::table('users')->where('id',$id)->get();
                                    foreach($user as $items):
                            ?>
                            <tr>
                                <td><?php echo '<a href="/dashboard/user/edit/'. $items->id . '">'. $items->name .'</a>';?></td>
                                <td><?php echo '<a href="mailto:'.$items->email.'">' . $items->email . '</a>'?></td>
                                <td><?=$items->created_at?></td>
                                <td><?php echo '<a href="tel:'.$items->phone.'">' . $items->phone . '</a>'?></td>
                                <td style="text-align: center;">

                                    <?php $role = Auth::user()->role;
                                    if($role !== 'Customer'){?>
                                        <?php if($items->deleted == 0){?>
                                        <button id="<?=$items->id?>" class="btn btn-danger btn-xs">Delete</button>
                                        <?php }else{ ?>
                                        <button id="<?=$items->id?>" class="btn btn-success btn-xs">Activate</button>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                              <?php endforeach;?>
                            <?php endforeach;?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

<div class="facility_id" style="display: none"><?=$facility_id?></div>


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
                var facility_id = $('.facility_id').text();

                    var conf = confirm("Are you sure you want to delete?");

                var id = $(this).attr('id');

                if(conf == true){

                    var data = {
                        id:id,
                        facility_id :facility_id,
                        deleted_fac :true
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