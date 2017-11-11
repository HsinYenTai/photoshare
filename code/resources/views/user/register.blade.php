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
                <h2 class="sub-title">生活热爱分享 - Thousands Find</h2>
            </div>

            <div class="cont-main clearfix">
                <div class="index-tab">
                    <div class="index-slide-nav">
                        <a href="login">登录</a>
                        <a href="register" class="active">注册</a>
                        <div class="slide-bar slide-bar1"></div>
                    </div>
                </div>

                <form action="postRegister" method="get">
                    <div class="login form">
                        <div class="group">
                            <div class="group-ipt email">
                                <input type="email" name="email" id="email" class="ipt" placeholder="邮箱地址" required>
                            </div>
                            <div class="group-ipt user">
                                <input type="text" name="user" id="user" class="ipt" placeholder="选择一个用户名" required>
                            </div>
                            <div class="group-ipt password">
                                <input type="password" name="password" id="password" class="ipt" placeholder="设置登录密码" required>
                            </div>
                            <div class="group-ipt password1">
                                <input type="password" name="password1" id="password1" class="ipt" placeholder="重复密码" required>
                            </div>
                            <div class="group-ipt verify">
                                <input type="text" name="verify" id="verify" class="ipt" placeholder="输入验证码" required>
                                <img src="http://zrong.me/home/index/imgcode?id=" class="imgcode">
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
        </body>
        </html>
