<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container">
    <div class="error">
        <div class="container-floud">
            <div class="col-xs-12 ground-color text-center">
                <h1 style="color: black"><?= nl2br(Html::encode($message)) ?></h1>
                <div class="hover-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="dedcription-btn" href="/">
                                <span class="name-descripeion"><?=Yii::t('app', 'Перейти на главную')?></span>
                                <div class="btn-icon brain">
                                    <i class="bi bi-house-door-fill"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container-error-404">
                    <div class="clip"><div class="shadow"><span class="digit thirdDigit"></span></div></div>
                    <div class="clip"><div class="shadow"><span class="digit secondDigit"></span></div></div>
                    <div class="clip"><div class="shadow"><span class="digit firstDigit"></span></div></div>
                    <div class="msg">OH!<span class="triangle"></span></div>
                </div>
                <div class="error-page-none-elements">
                    <div id="error-one-element"><?=substr((string)Yii::$app->response->statusCode, 0, 1);?></div>
                    <div id="error-two-element"><?=substr((string)Yii::$app->response->statusCode, 1, 1);?></div>
                    <div id="error-for-element"><?=substr((string)Yii::$app->response->statusCode, 2, 1)?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>

    .bi-house-door-fill{
        font-size: 25px;
        margin: -12px;
    }
    .name-descripeion{
        font-weight: bold;
    }
    .dedcription-btn {
        width: 100%;
        position: relative;
        display: inline-block;
        border-radius: 30px;
        background-color: #fcfcfc;
        color: #ffa000;
        text-align: center;
        font-size: 18px;
        padding: 9px 0;
        transition: all 0.3s;
        padding-right: 40px;
        margin: 20px 5px;
        box-shadow: 0 3px 20px 0 rgba(0, 0, 0, 0.06);
    }
    .dedcription-btn .btn-icon {
        background-color: #ffa000;
        width: 92px;
        height: 45px;
        float: right;
        position: absolute;
        border-radius: 30px 30px 30px 0;;
        right: 0px;
        top: 0px;
        transition: all 0.3s;
    }
    .name-descripeion {
        position: relative;
        z-index: 9999;
    }
    .btn-icon::after {
        content: "";
        width: 0;
        height: 0;
        border-top: 45px solid #fcfcfc;
        border-right: 40px solid transparent;
        position: absolute;
        top: 0px;
        left: 0px;
    }
    .dedcription-btn:hover .btn-icon {
        width: 100%;
        border-radius: 30px;
    }
    .dedcription-btn:hover .btn-icon::after {
        display: none;
        opacity: 0.1;
    }
    .btn-icon i {
        position: absolute;
        right: 25px;
        top: 15px;
        color: #fff;
    }
    .dedcription-btn:hover {
        color: #fff!important;
    }
    .heart {
        background-color: #ff586b!important;
    }
    .book {
        background-color: #00b7c4!important;
    }
    .brain {
        background-color: #FE2424!important;
    }
    .hover-box {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .error-page-none-elements{
        display: none;
    }
    .ground-color{
        margin: 8% 0 8% 0;
    }
    /* Error Page */
    .error .clip .shadow
    {
        height: 180px;  /*Contrall*/
    }
    .error .clip:nth-of-type(2) .shadow
    {
        width: 130px;   /*Contrall play with javascript*/
    }
    .error .clip:nth-of-type(1) .shadow, .error .clip:nth-of-type(3) .shadow
    {
        width: 250px; /*Contrall*/
    }
    .error .digit
    {
        width: 150px;   /*Contrall*/
        height: 150px;  /*Contrall*/
        line-height: 150px; /*Contrall*/
        font-size: 120px;
        font-weight: bold;
    }
    .error h2   /*Contrall*/
    {
        font-size: 32px;
    }
    .error .msg /*Contrall*/
    {
        top: -190px;
        left: 30%;
        width: 80px;
        height: 80px;
        line-height: 80px;
        font-size: 32px;
    }
    .error span.triangle    /*Contrall*/
    {
        top: 70%;
        right: 0%;
        border-left: 20px solid #535353;
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
    }


    .error .container-error-404
    {
        position: relative;
        height: 250px;
    }
    .error .container-error-404 .clip
    {
        display: inline-block;
        transform: skew(-45deg);
    }
    .error .clip .shadow
    {

        overflow: hidden;
    }
    .error .clip:nth-of-type(2) .shadow
    {
        overflow: hidden;
        position: relative;
        box-shadow: inset 20px 0px 20px -15px rgba(150, 150, 150,0.8), 20px 0px 20px -15px rgba(150, 150, 150,0.8);
    }

    .error .clip:nth-of-type(3) .shadow:after, .error .clip:nth-of-type(1) .shadow:after
    {
        content: "";
        position: absolute;
        right: -8px;
        bottom: 0px;
        z-index: 9999;
        height: 100%;
        width: 10px;
        background: linear-gradient(90deg, transparent, rgba(173,173,173, 0.8), transparent);
        border-radius: 50%;
    }
    .error .clip:nth-of-type(3) .shadow:after
    {
        left: -8px;
    }
    .error .digit
    {
        position: relative;
        top: 8%;
        color: white;
        background: #FE2424;
        border-radius: 50%;
        display: inline-block;
        transform: skew(45deg);
    }
    .error .clip:nth-of-type(2) .digit
    {
        left: -10%;
    }
    .error .clip:nth-of-type(1) .digit
    {
        right: -20%;
    }.error .clip:nth-of-type(3) .digit
     {
         left: -20%;
     }
    .error h2
    {
        color: #A2A2A2;
        font-weight: bold;
        padding-bottom: 20px;
    }
    .error .msg
    {
        position: relative;
        z-index: 9999;
        display: block;
        background: #535353;
        color: #A2A2A2;
        border-radius: 50%;
        font-style: italic;
    }
    .error .triangle
    {
        position: absolute;
        z-index: 999;
        transform: rotate(45deg);
        content: "";
        width: 0;
        height: 0;
    }

    /* Error Page */
    @media(max-width: 767px)
    {
        /* Error Page */
        .error .clip .shadow
        {
            height: 100px;  /*Contrall*/
        }
        .error .clip:nth-of-type(2) .shadow
        {
            width: 80px;   /*Contrall play with javascript*/
        }
        .error .clip:nth-of-type(1) .shadow, .error .clip:nth-of-type(3) .shadow
        {
            width: 100px; /*Contrall*/
        }
        .error .digit
        {
            width: 80px;   /*Contrall*/
            height: 80px;  /*Contrall*/
            line-height: 80px; /*Contrall*/
            font-size: 52px;
        }
        .error h2   /*Contrall*/
        {
            font-size: 24px;
        }
        .error .msg /*Contrall*/
        {
            top: -110px;
            left: 15%;
            width: 40px;
            height: 40px;
            line-height: 40px;
            font-size: 18px;
        }
        .error span.triangle    /*Contrall*/
        {
            top: 70%;
            right: -3%;
            border-left: 10px solid #535353;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
        }
        .error .container-error-404
        {
            height: 150px;
        }
        /* Error Page */
    }

</style>
<script>
    function randomNum()
    {
        "use strict";
        return Math.floor(Math.random() * 9)+1;
    }
    var loop1,loop2,loop3,time=30, i=0, number, selector3 = document.querySelector('.thirdDigit'), selector2 = document.querySelector('.secondDigit'),
        selector1 = document.querySelector('.firstDigit');
    loop3 = setInterval(function()
    {
        "use strict";
        if(i > 40)
        {
            clearInterval(loop3);
            selector3.textContent = $('#error-one-element').html();
        }else
        {
            selector3.textContent = randomNum();
            i++;
        }
    }, time);
    loop2 = setInterval(function()
    {
        "use strict";
        if(i > 80)
        {
            clearInterval(loop2);
            selector2.textContent = $('#error-two-element').html();
        }else
        {
            selector2.textContent = randomNum();
            i++;
        }
    }, time);
    loop1 = setInterval(function()
    {
        "use strict";
        if(i > 100)
        {
            clearInterval(loop1);
            selector1.textContent = $('#error-for-element').html();
        }else
        {
            selector1.textContent = randomNum();
            i++;
        }
    }, time);
</script>