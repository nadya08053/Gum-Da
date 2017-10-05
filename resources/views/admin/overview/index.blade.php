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
                        <li><a href="/">Dashboard</a></li>
                        <li class="active">
                            <span>Overview</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Overview
                </h2>
                <small>overview.</small>
            </div>
        </div>
    </div>


    <style>

    </style>


    <div class="content">

        <div class="row projects">
            <div class="col-lg-6">
                <div class="hpanel hgreen">
                    <div class="panel-body">

                       <div class="col-lg-6">Activities feed</div>
                       <div class="col-lg-6" style="text-align: right;"><b>View all</b></div>


                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="hpanel hyellow">
                    <div class="panel-body">
                        <div class="col-lg-6"><b>Main goal progress</b></div>
                        <div class="col-lg-6" style="text-align: right;">Display : <b>5m Run <i class="pe-7s-angle-down"></i></b></div>
                    </div>

                </div>
            </div>
        </div>








        <div class="row social-board">
            <div class="col-lg-6">
                <div class="hpanel hblue">
                    <div class="panel-body">
                        <div class="media social-profile clearfix">
                            <a class="pull-left">
                                <img src="/admin/images/a4.jpg" alt="profile-picture">
                            </a>
                            <div class="media-body">
                                <h5>Anna Smith</h5>
                                <small class="text-muted">21.03.2015</small>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <div class="social-talk">
                            <div class="media social-profile clearfix">
                                <a class="pull-left">
                                    <img src="/admin/images/a1.jpg" alt="profile-picture">
                                </a>

                                <div class="media-body">
                                    <span class="font-bold">John Novak</span>
                                    <small class="text-muted">21.03.2015</small>

                                    <div class="social-content">
                                        Injected humour, or randomised words which don't look even slightly believable.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-talk">
                            <div class="media social-profile clearfix">
                                <a class="pull-left">
                                    <img src="/admin/images/a3.jpg" alt="profile-picture">
                                </a>

                                <div class="media-body">
                                    <span class="font-bold">Mark Smith</span>
                                    <small class="text-muted">14.04.2015</small>
                                    <div class="social-content">
                                        Many desktop publishing packages and web page editors.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-form">
                            <input class="form-control" placeholder="Your comment">
                        </div>
                    </div>
                </div>
            </div>


            <link rel="stylesheet" href="{{ asset('/admin/vendor/chartist/custom/chartist.css') }}" />



            <div class="row">
                <div class="col-lg-6">
                    <div class="hpanel">
{{--                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                                <a class="closebox"><i class="fa fa-times"></i></a>
                            </div>
                            Line chart with area
                        </div>--}}
                        <div class="panel-body">
                            <div>
                                <div id="ct-chart7" class="ct-major-twelfth"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row projects">


                <div class="col-lg-6" style="padding:0;">

                    <div class="col-lg-12">
                        <div class="hpanel">
                            <div class="panel-body">
                                <div class="media clearfix">
                                    <a class="pull-left">
                                        <img src="/admin/images/a2.jpg" alt="profile-picture">
                                    </a>
                                    <div class="media-body">
                                        <h5>Why do we use it?</h5>
                                        <p>
                                        <small class="text-muted">It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout</small>
                                            </p>
                                        <p>
                                        <small class="text-muted">21.03.2015</small>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="hpanel">
                            <div class="panel-body">
                                <div class="media clearfix">
                                    <a class="pull-left">
                                        <img src="/admin/images/a3.jpg" alt="profile-picture">
                                    </a>
                                    <div class="media-body">
                                        <h5>Why do we use it?</h5>
                                        <p>
                                            <small class="text-muted">It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout</small>
                                        </p>
                                        <p>
                                            <small class="text-muted">21.03.2015</small>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="hpanel">
                            <div class="panel-body">
                                <div class="media clearfix">
                                    <a class="pull-left">
                                        <img src="/admin/images/a3.jpg" alt="profile-picture">
                                    </a>
                                    <div class="media-body">
                                        <h5>Why do we use it?</h5>
                                        <p>
                                            <small class="text-muted">It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout</small>
                                        </p>
                                        <p>
                                            <small class="text-muted">21.03.2015</small>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>



                </div>

                <div class="col-lg-6"  style="padding:0;">



                    <style>
                        .blockNum span{
                            display: block;
                            text-align: center;

                        }
                        .blockNum{
                            margin: 36px 20px 36px 20px;
                        }
                        .blockNum span:first-child{

                        }
                    </style>

                    <div class="col-lg-12">
                        <div class="hpanel hyellow">
                            <div class="panel-body">
                                <div class="col-lg-6"><b>Other progress</b></div>
                                <div class="col-lg-6" style="text-align: right;"><b>View all</b></div>
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <div class="blockNum">
                                            <span><b><i class="pe-7s-angle-up"></i> 62 kg</b></span>
                                            <span>+3kg until weight goal</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="blockNum">
                                            <span><b><i class="pe-7s-angle-down"></i> 30</b></span>
                                            <span>-2 until waist goal</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>





                        <div class="col-lg-12">
                            <div class="hpanel hblue">
                                <div class="panel-body">
                                    <div class="media social-profile clearfix">

                                        <style>
                                            .divTable{
                                                width: 20px;height: 20px;margin: 6px;
                                                border-radius: 3px;;

                                            }
                                            table td{
                                                border: dashed 1px darkgrey;
                                            }
                                        </style>




                                        <div class="media-body">
                                            <h5 style="margin: 10px 10px 40px 0;">Annual heatmap</h5>


                                            <table>

                                                <tr>
                                                    <th><div style="padding: 6px 10px 6px 10px;">Mon</div></th>
                                                    <td><div style="background-color: mediumpurple;" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumslateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>

                                                </tr>

                                                <tr>
                                                    <th><div style="padding: 6px 10px 6px 10px;">Tue</div></th>
                                                    <td><div style="background-color: white;" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumslateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>

                                                </tr>
                                                <tr>
                                                    <th><div style="padding: 6px 10px 6px 10px;">Wed</div></th>
                                                    <td><div style="background-color: white;" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>

                                                </tr>
                                                <tr>
                                                    <th><div style="padding: 6px 10px 6px 10px;">Thu</div></th>
                                                    <td><div style="background-color: white;" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>

                                                </tr>
                                                <tr>
                                                    <th><div style="padding: 6px 10px 6px 10px;">Fri</div></th>
                                                    <td><div style="background-color: white;" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>

                                                </tr>
                                                <tr>
                                                    <th><div style="padding: 6px 10px 6px 10px;">Sat</div></th>
                                                    <td><div style="background-color: slateblue;" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>

                                                </tr>
                                                <tr>
                                                    <th><div style="padding: 6px 10px 6px 10px;">Sun</div></th>
                                                    <td><div style="background-color: mediumpurple;" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumslateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>
                                                    <td><div style="background-color: slateblue" class="divTable"></div></td>
                                                    <td><div style="background-color: mediumpurple" class="divTable"></div></td>
                                                    <td><div style="background-color: white" class="divTable"></div></td>

                                                </tr>
                                                <tr>
                                                      <th></th>
                                                    <th colspan="3"> April</th>
                                                    <th colspan="3"> May</th>
                                                    <th colspan="3"> June</th>
                                                    <th colspan="3"> July</th>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                </div>


            </div>

        </div>

        <div class="row projects">
            <div class="col-md-6 col-lg-6">

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="hpanel hyellow">
                    <div class="panel-body">
                        <div style="margin: 0 0 40px 0;">
                            <div class="col-md-6 col-lg-6"><b>Muscle map</b></div>
                            <div class="col-md-6 col-lg-6" style="text-align: right;">Display : <b>Last week <i class="pe-7s-angle-down"></i></b></div>
                        <div style="clear: both;"></div>
                        </div>
                        <style>
                            .blockMuscule{
                                padding: 8px;
                                border-left:1px solid lightgrey;
                                border-bottom:1px solid lightgrey;
                            }

                            .blockMuscule p{
                                text-align: center;
                            }
                        </style>

                        <div class="col-md-12 col-lg-12">
                            <div class="col-md-6 col-lg-6" style=" margin: 0 0 40px 0;">
                                <img src="/admin/images/MuscleMap.jpg" alt="MuscleMap"/>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="blockMuscule">
                                    <p><b>6h 55min</b></p>
                                    <p>Time Trained</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="blockMuscule">
                                    <p><b>5</b></p>
                                    <p>Sessions</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="blockMuscule">
                                    <p><b>22</b></p>
                                    <p>Miles Recorded</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="blockMuscule">
                                    <p><b>22</b></p>
                                    <p>Calories Burnt</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="blockMuscule">
                                    <p><b>4573 lbs</b></p>
                                    <p>CLifted</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-lg-12">
                            <div class="col-md-6 col-lg-6" style="text-align: center;"><b>FRONT</b> BACK</div>
                            <div class="col-md-6 col-lg-6"></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>



    </div>

    <script src="{{ asset('/admin/vendor/chartist/dist/chartist.min.js') }}"></script>

    <script>

        $(function () {


/*            var arr = ['white', 'black'];


            var ran = Math.random() * (10 - 1) + 1;
            ran = Math.round(ran);

            console.log(ran);
            console.log(arr[1]);*/




            // Simple line

            new Chartist.Line('#ct-chart7', {
                labels: [1, 2, 3, 4, 5, 6, 7, 8],
                series: [[5, 9, 7, 8, 5, 3, 5, 4]
                ]
            }, {
                low: 0,
                showArea: true
            });




        });

    </script>

@stop