<?php
use App\Blog;
use Illuminate\Support\Facades\DB;
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Alex">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <?php
    if(!empty($ceo)){?>
    <title><?=$ceo[0]?></title>
    <meta name="keywords" content="<?=$ceo[1]?>">
    <meta name="description" content="<?=$ceo[2]?>">
    <?php } ?>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/theme/css/bootstrap.css">
    <link rel="stylesheet" href="/theme/css/font-awesome.css" />
    <link rel="stylesheet" href="/theme/css/style.css" />

    <!--[if lt IE 8]>
    <link rel="stylesheet" href="/theme/css/style_ie7.css" />
    <![endif]-->

    <link rel="stylesheet" href="/theme/css/sequence.css">
    <link rel="stylesheet" href="/theme/css/nivo-slider.css">
    <link rel="stylesheet" href="/theme/js/lightbox/themes/default/jquery.lightbox.css" />
    <script src="/theme/js/modernizr.min.js"></script>

{{--    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />--}}

</head>
<body class="default">

<header>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div id="logo">
                </div>

                <form class="form-search" action="/search" method="get">
                    <div class="input-append">
                        <input type="text" name="val" class="span3 search-query" placeholder="Поиск . . .">
                        <span class="add-on"><i class="icon-search"></i></span>
                    </div>
                </form>


                <div id="mainNavContainer">
                    <ul id="mainNav">
                        <?php
                        $menu = ['/'=>'Главная','/portfolio'=>'Портфолио','/blog/'=>'Блог','/faq'=>'Вопросы','/affiliate_program'=>'Партнерство'];

                        foreach($menu as $key=>$val):
                        if($_SERVER['REQUEST_URI'] == $key){
                        ?>

                            <li class="dropdown">
                                <a href="<?=$key?>" class="active">
                                    <span><?=$val?></span>
                                </a>
                            </li>
                        <?php }else{ ?>
                            <li class="dropdown">
                                <a href="<?=$key?>">
                                    <span><?=$val?></span>
                                </a>
                            </li>
                            <?php }
                              endforeach;?>

                    </ul>
                </div><!--mainNavContainer-->
            </div><!--span12-->
        </div><!--row-->
    </div><!--container-->
</header>

<div id="content">
           @yield('content')
    </div>

<footer>
    <div class="container">
        <div class="row">

            <div class="span3">
                <h5>Сервис</h5>
                <hr>
                <p>
                    Вы получите полное сопровождение сайта все время его существования и всегда сможете с нами связаться.
                </p>
            </div><!--span3-->

            <div class="span3">
                <h5>Контакты</h5>
                <hr>
                <p>
                    <strong class="colored"> Адрес:</strong> Украина Одесса<br>
                    <strong class="colored">Телефон:</strong> +38(093)54-33-156<br>
                    <strong class="colored">Почта:</strong> sitedevelop.in.ua@gmail.com
                </p>
            </div><!--span3-->

            <div class="span3">
                <h5>Соцсети</h5>
                <hr>
                <ul class="social">
{{--                    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="ru">Твитнуть</a>--}}

                    <li>
                        <a href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER['HTTP_HOST'];?>" id="share" title="Facebook"><i class="icon-facebook icon-large"></i> <span>Facebook</span></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/share" title="Twitter"><i class="icon-twitter icon-large" data-lang="ru"></i> <span>Twitter</span></a>
                    </li>

                    <li>
                        <a href="https://plus.google.com/discover" title="Google+"><i class="icon-google-plus icon-large"></i> <span>Google+</span></a>
                    </li>
                </ul>
            </div><!--span3-->

            <div class="span3">
                <h5>Наш блог</h5>
                <hr>
                <ul class="linksListFooter">

                    <?php
                    $blogs = DB::table('blog')->select('title','urls')->orderBy('id', 'desc')->limit(3)->get();

                    foreach($blogs as $items):
                    ?>
                    <li>
                        <a href="/blog/view/<?=$items->urls?>"><i class="icon-caret-right"></i><span><?=$items->title?></span></a>
                    </li>
                    <?php endforeach;?>

                </ul>
            </div><!--span3-->

            <div>Copyright &copy; 2013 - <?=date('Y')?>. Все права защищены!</div>

        </div><!--row-->
    </div><!--container-->
</footer>



<div id="toTop" title="Back to top"><i class="icon-chevron-up icon-large"></i></div>
<!-- ===================== SCRIPT ===================== -->
<script src="/theme/js/jquery.1.7.1.min.js"></script>
<script src="/theme/js/jquery.easing.1.3.js"></script>
<script src="/theme/js/bootstrap.js"></script>
<script src="/theme/js/jquery.isotope.min.js"></script>
{{--<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>--}}
{{--<script src="/theme/js/gmap3.min.js"></script>--}}
<script src="/theme/js/equalize.min.js"></script>
<script src="/theme/js/superfish.js"></script>
<script src="/theme/js/sequence.jquery-min.js"></script>
<script src="/theme/js/jquery.nivo.slider.pack.js"></script>
<script src="/theme/js/lightbox/jquery.lightbox.min.js"></script>
<script src="/theme/js/jQuery.BlackAndWhite.min.js"></script>
<script src="/theme/js/costum.js"></script>

<style type="text/css">

    #callback {
        background-color: black;
        display: inline-block;
        width: 100px;
        bottom: 300px;
        right: -70px;
        position: fixed;
        z-index: 3;
        cursor: pointer;
        transition: opacity 0.5s linear;
        border-radius: 10px 0 0 10px;
        font-size: 40px;
        padding: 20px;
        color: white;
    }
    #callback.visible {
        visibility: visible;
        opacity: 0.5;
    }
    #callback.fade-out {
        opacity: 1;
    }
    #callback:hover {
        background-color: white;
    }
    .logo p{
        font-weight: bold;
        color: white;
        font-size: 14px;
    }
    #callback_panel{
        padding:10px 20px;
        display: block;
        width: 230px;
        height:290px;
        bottom: 150px;
        right: -350px;
        position: fixed;
        z-index: 4;
        background-color: black;
    }
    .callback_form input{
        margin: 5px 0 5px 0;
    }
    .callback_form textarea{
        margin: 5px 0 5px 0;
    }
    #result{
        height: 10px;display: block;
    }
    #send{
        display: block;margin-top: 10px;
    }
</style>

<div id="callback">
    <i class="icon-custom icon-md icon-bg-darker icon-line icon-envelope"></i>
</div>
<div id="callback_panel">
    <div class="logo">
        <p>Контакты</p>
    </div>
    <form class="callback_form">
        <input type="text" id="name" class="form-control" placeholder="Имя">
        <input type="text" id="email" class="form-control" placeholder="Почта">
        <input type="text" id="title" class="form-control" placeholder="Тема">
        <textarea class="form-control" rows="3" id="message" placeholder="Текст"></textarea>
        {{ csrf_field() }}
        <span id="result"></span>
        <a class="btn btn-info" id="send">Отправить</a>
    </form>
</div>

<script type="text/javascript">

    $(document).ready(function($) {
        var offset = 450;
        var offset_opacity = 450;
        var scroll_top_duration = 900;
        var callback = $('#callback');
        $(window).scroll(function () {
            ( $(this).scrollTop() > offset ) ? callback.addClass('visible') : callback.removeClass('visible fade-out');
            if ($(this).scrollTop() > offset_opacity) {
                callback.addClass('fade-out');
            }
        });
        callback.click(function () {
            if($(this).hasClass('open')) {
                $("#callback_panel").animate({right: '-270px'}, 450);
                $("#callback").animate({right: '-70px'}, 450);
                $("#callback").removeClass('open');
            }else{
                $("#callback_panel").animate({right: '0px'}, 450);
                $("#callback").animate({right: '200px'}, 450);
                $("#callback").addClass('open');
            }
        });




        $("#result").html('');
        $("#send").click(function(){

            var name = $("#name").val();
            var title = $("#title").val();
            var email = $("#email").val();
            var message = $("#message").val();

            $("#result").html('');


            var name_error = '';

            if(name !== ''){
                var preg_name = name.match(/^[0-9A-Za-zА-Яа-яЁё]+$/);
                console.log(preg_name);
                if(preg_name !== null){
                    $("#name").css({"border":"1px solid green"});
                    $("#errorName").html('');
                    name_error = false;
                } else{
                    name_error = true;
                    $("#errorName").html('<b style="color: red;">Неверно введено Имя, только цифры или буквы!</b>');
                    $("#name").css({"border":"1px solid red"});
                }
            }else{
                name_error = true;
                $("#name").css({"border":"1px solid red"});
                $("#errorName").html('<b style="color: red;">Поле не должно быть пустым!</b>');
            }


            var title_error = '';

            if(title !== ''){

                $("#title").css({"border":"1px solid green"});
                $("#errorTitle").html('');
                title_error = false;

            }else{
                title_error = true;
                $("#title").css({"border":"1px solid red"});
                $("#errorTitle").html('<b style="color: red;">Поле не должно быть пустым!</b>');
            }


            var email_error = '';

            if(email !== ''){
                var preg_email = email.match(/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/i);
                if(preg_email !== null){
                    $("#email").css({"border":"1px solid green"});
                    $("#errorEmail").html('');
                    email_error = false;

                } else{
                    email_error = true;
                    $("#errorEmail").html('<b style="color: red;">Неверно введен Е-мейл!</b>');
                    $("#email").css({"border":"1px solid red"});
                }
            }else{
                email_error = true;
                $("#email").css({"border":"1px solid red"});
                $("#errorEmail").html('<b style="color: red;">Поле не должно быть пустым!</b>');
            }



            var message_error = '';

            if(message !== ''){
                $("#message").css({"border":"1px solid green"});
                $("#errorMessage").html('');
                message_error = false;

            }else{
                message_error = true;
                $("#message").css({"border":"1px solid red"});
                $("#errorMessage").html('<b style="color: red;display: block;padding-bottom: 5px;">Поле не должно быть пустым!</b>');
            }


            if(name_error !== true && email_error!== true && title_error!== true && message_error!== true){

                var data = {
                    email:email,
                    name:name,
                    title:title,
                    message:message,
                    contact:true
                };

                $.ajax({
                    url: '/send',
                    type: 'POST',
                    data: data,
                    success: function (res) {
                         console.log(res);
                        if(res == true){
                            $("#name").val('');
                            $("#name").css({"border":"1px solid #ccc"});
                            $("#title").val('');
                            $("#title").css({"border":"1px solid #ccc"});
                            $("#email").val('');
                            $("#email").css({"border":"1px solid #ccc"});
                            $("#message").val('');
                            $("#message").css({"border":"1px solid #ccc"});
                            $("#result").html('<i style="color: white;display: block;padding-bottom: 2px;">Ваше сообшение отправлено!</i>');
                        }
                    },
                    error: function (res) {
                        console.log('Ошибка передачи данных!');
                    }
                });

            }



        });



    });


</script>

</body>

</html>
