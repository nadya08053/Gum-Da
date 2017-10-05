$(function(){

    //$("form").mouseover(function(){
        $("form input").each(function(){

            var arr = ['name','password','email','zip','datapicker2'];

            for(var i = 0; i < arr.length; i++) {
/*                if($(this).attr('name') == 'password'){
                    if($(this).attr('name').length < 5) {
                        return false;
                    }

                }*/
                if ($(this).attr('name') == arr[i]) {

                    if($(this).val() == '') {
                        $("form").find('button[type="submit"]').prop("disabled", true);
                        $("#" + arr[i]).addClass('error');
                        $("." + arr[i]).addClass('errorSpan').text('The field can not be empty!');
                    }
                } else {
                    $("form").find('button[type="submit"]').prop("disabled", false);
                    $("#" + arr[i]).removeClass('error');
                    $("." + arr[i]).removeClass('errorSpan').text('');

                }
            }

        });

    //});


    $("form input").blur(function(){

        var name = $("#name").val();
        var password = $("#password").val();
        var confpassword = $("#confpassword").val();
        var lname = $("#lname").val();
        var fname = $("#fname").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var street_1 = $("#street_1").val();
        var street_2 = $("#street_2").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var zip = $("#zip").val();
        var datapicker2 = $("#datapicker2").val();

        var name_error = '';

        if(name !== ''){

            $("#name").removeClass('error');
            $(".name").text('');
            name_error = false;
        }else{
            name_error = true;
            $("#name").addClass('error');
            $(".name").addClass('errorSpan').text('The field can not be empty!');
        }

        var password_error = '';

        if(password !== ''){
            if(password.length >= 8){
                $("#password").removeClass('error');
                $(".password").text('');
                password_error = false;
            } else{
                password_error = true;
                $(".password").addClass('errorSpan').text('Password must be longer than 8 characters!');
                $("#password").addClass('error');

                confpassword_error = true;
                $(".confpassword").addClass('errorSpan').text('Incorrect password confirmation data!');
                $("#confpassword").addClass('error');
            }
        }else{
            password_error = true;
            $("#password").addClass('error');
            $(".password").addClass('errorSpan').text('The field can not be empty!');

            confpassword_error = true;
            $(".confpassword").addClass('errorSpan').text('Incorrect password confirmation data!');
            $("#confpassword").addClass('error');
        }


        var confpassword_error = '';

        if(confpassword !== ''){
            if(confpassword === password){
                $("#confpassword").removeClass('error');
                $(".confpassword").text('');
                confpassword_error = false;
            } else{
                confpassword_error = true;
                $(".confpassword").addClass('errorSpan').text('Incorrect password confirmation data!');
                $("#confpassword").addClass('error');
            }
        }


        var email_error = '';

        if(email !== ''){
            var preg_email = email.match(/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/i);
            if(preg_email !== null){
                $("#email").removeClass('error');
                $(".email").text('');
                email_error = false;
            } else{
                email_error = true;
                $("#email").addClass('error');
                $(".email").addClass('errorSpan').text('Invalid format E-mail!');
            }
        }else{
            email_error = true;
            $("#email").addClass('error');
            $(".email").addClass('errorSpan').text('The field can not be empty!');
        }



        var zip_error = '';
        if(zip !== ''){
            $("#zip").removeClass('error');
            $(".zip").text('');
            zip_error = false;
        }else{
            zip_error = true;
            $("#zip").addClass('error');
            $(".zip").addClass('errorSpan').text('The field can not be empty!');
        }

        var datapicker2_error = '';
        if(datapicker2 !== ''){
            $("#datapicker2").removeClass('error');
            $(".datapicker2").text('');
            datapicker2_error = false;
        }else{
            datapicker2_error = true;
            $("#datapicker2").addClass('error');
            $(".datapicker2").addClass('errorSpan').text('The field can not be empty!');
        }

        if(name_error == false && password_error == false && confpassword_error == false && email_error == false
            && zip_error == false && datapicker2_error == false){

            $("form").find('button[type="submit"]').prop("disabled", false);
        }else{
            $("form").find('button[type="submit"]').prop("disabled", true);
        }

    });


});
