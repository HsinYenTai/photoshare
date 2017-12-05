<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/25
 * Time: 10:18
 */
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>注册 - photo share </title>
            <meta author="xinyan">
            <link rel="stylesheet" type="text/css" href="../style/register-login.css">
        </head>
        <body>
        <div id="box"></div>
        <div class="cent-box register-box">
            <div class="cent-box-header">
                <h1 class="main-title hide">photo share </h1>
                <h2 class="sub-title">生活热爱分享 - photo share</h2>
            </div>

            <div class="cont-main clearfix">
                <div class="index-tab">
                    <div class="index-slide-nav">
                        <a href="../user/login">登录</a>
                        <a href="../user/register" class="active">注册</a>
                        <div class="slide-bar slide-bar1"></div>
                    </div>
                </div>

                <form action="../user/postRegister" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="login form">
                        <div class="group">
                            <div class="group-ipt email">
                                <input type="email" name="email" id="email" class="ipt" placeholder="邮箱地址" required>
                            </div>
                            <div class="group-ipt user">
                                <input type="text" name="name" id="name" class="ipt" placeholder="选择一个用户名" required>
                            </div>
                            <div class="group-ipt password">
                                <input type="password" name="password" id="password" class="ipt" placeholder="设置登录密码" required>
                            </div>
                            <div class="group-ipt password1">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="ipt" placeholder="重复密码" required>
                            </div>
                            <div class="group-ipt verify">
                                <input disabled type="text" name="verify" value="2907" id="verify" class="ipt" placeholder="输入验证码" required>
                                <img src="data:image/jpeg;base64,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" class="imgcode">
                            </div>
                        </div>
                    </div>

                    <div class="button">
                        <button type="submit" class="login-btn register-btn" id="button">注册</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="footer">
            <p>photo share - Thousands Find</p>
            <p>Designed By xinyan & <a href="https://github.com/daixinyan/">xinyan</a> 2016</p>
        </div>

        <script src='../js/particles.js' type="text/javascript"></script>
        <script src='../js/background.js' type="text/javascript"></script>
        <script src='../js/jquery.min.js' type="text/javascript"></script>
        <script src='../js/layer/layer.js' type="text/javascript"></script>
        <script src='../js/index.js' type="text/javascript"></script>
        <script>
            $('.imgcode').hover(function(){
                layer.tips("看不清？点击更换", '.verify', {
                    time: 6000,
                    tips: [2, "#3c3c3c"]
                })
            },function(){
                layer.closeAll('tips');
            }).click(function(){
                $(this).attr('src','http://zrong.me/home/index/imgcode?id=' + Math.random());
            })

            $(".login-btn").click(function(){
                var email = $("#email").val();
                var password = $("#password").val();
                var verify = $("#verify").val();
                // $.ajax({
                // url: 'http://www.zrong.me/home/index/userLogin',
                // type: 'post',
                // jsonp: 'jsonpcallback',
                //       jsonpCallback: "flightHandler",
                // async: false,
                // data: {
                // 	'email':email,
                // 	'password':password,
                // 	'verify':verify
                // },
                // success: function(data){
                // 	info = data.status;
                // 	layer.msg(info);
                // }
                // })

            })
            $("#remember-me").click(function(){
                var n = document.getElementById("remember-me").checked;
                if(n){
                    $(".zt").show();
                }else{
                    $(".zt").hide();
                }
            })
        </script>
        @include('common.message')
        </body>
        </html>
