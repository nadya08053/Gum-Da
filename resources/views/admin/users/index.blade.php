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
                        <li><a href="{{ url('/') }}/dashboard">Dashboard</a></li>
                        <li class="active">
                            <span>Users List</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Users List
                </h2>
                <small>list of all site users</small>
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
                        <a href="{{ url('/') }}/dashboard/user/create" class="btn btn-primary" type="button"><i class="fa fa-group"></i> <br/>Add User</a>
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
                                <th>Email</th>
                                <th>Trainer</th>
                                <th>Created</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <td></td>
                            </tr>
                            </thead>


                            <tbody>
                            <?php
                              foreach($list as $items):
                            ?>
                            <tr>
                                <td><?php
                                    if(!$items->deleted_at){
                                    echo '<a href="'.url('/').'/dashboard/user/edit/'. $items->id . '" style="font-style: italic;">'. $items->name .'</a>';
                                    }else{
                                        echo '<a href="'.url('/').'/dashboard/user/edit/'. $items->id . '">'. $items->name .'</a>';
                                     } ?>
                                </td>
                                <td><?php echo '<a href="mailto:'.$items->email.'">' . $items->email . '</a>'?></td>
                                <td><?php
                                    $trainer = $items->trainer_id;
                                        $name = DB::table('users')->select('name')->where('id', $trainer)->get();

                                        foreach($name as $item){
                                            echo  $item->name;
                                        }
                                    ?></td>
                                <td><?=$items->created_at?></td>
                                <td><?php echo '<a href="tel:'.$items->phone.'">' . $items->phone . '</a>'?></td>
                                <td><?=$items->role?></td>
                                <td style="text-align: center;">

                                    <?php $role = Auth::user()->role;
                                    if($role !== 'Customer'){?>
                                       <?php if(!$items->deleted_at){?>
                                            <button id="<?=$items->id?>" class="btn btn-danger btn-xs">Delete</button>
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
                        url: "{{ url('/') }}/dashboard/user/delete",
                        type: 'POST',
                        data: data,
                        success: function (res) {
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
