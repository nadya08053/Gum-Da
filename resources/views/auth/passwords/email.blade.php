@extends('layouts.app')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">

                    <form id="mailForm" class="form-horizontal" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email">
                               <span id="message"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary" id="emailSend">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#emailSend").click(function(e){
                e.preventDefault();

                var email = $('#email').val();


                if(email !== ''){

                    var data = {
                        email:email
                    };

                    $.ajax({
                        url: '/change_email',
                        type: 'POST',
                        data: data,
                        success: function (res) {
                            console.log(res);

                            if (res == 1) {

                                $('#message').html('<i style="color: green;font-weight: bold;">The new password has been sent to your e-mail!</i>');
                                $('form').trigger("reset");
                             //   var url = "/dashboard/userslist";
                            //    $(location).attr('href', url);
                            }else{
                                $('#message').html('<i style="color: red;font-weight: bold;">Unknown e-mail!</i>');
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



@endsection
