@extends('layouts.main')

@section('content')

    <?php
    $ceo = ['Ошибка 404','Ошибка 404','Ошибка 404: Страница не найдена на WingSiteGroop'];
    ?>


    <div class="container">
        <div class="row">
            <div class="span5">
                <h2 class="errorCode">
                    404
                </h2>
            </div><!--span5-->

            <div class="span7">
                <h2>Ошибка 404: Страница не найдена</h2>
                <p><strong>Извините, но мы не можем найти то что вы ищите.
                    </strong>Возможно вы что-то пропустили или нажали случайно не те клавиши.</p>
                <div class="row">
                    <div class="span3">
                        <ul class="nav nav-list">
                            <li class="nav-header">
                                Дополнительное меню:
                            </li>
                            <li>
                                <a href="#" onClick="history.go(-1)">
                                    <i class="icon-chevron-left"></i>
                                    Назад
                                </a>
                            </li>
                            <li>
                                <a href="/">
                                    <i class="icon-home"></i>
                                    На главную
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--span7-->
        </div><!--row-->

    </div><!--container-->


@stop