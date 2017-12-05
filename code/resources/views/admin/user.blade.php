<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <!--
    	The codes are free, but we require linking to our web site.
    	Why to Link?
    	A true story: one girl didn't set a link and had no decent date for two years, and another guy set a link and got a top ranking in Google!
    	Where to Put the Link?
    	home, about, credits... or in a good page that you want
    	THANK YOU MY FRIEND!
    -->
    <title>Users Products todo - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/jquery.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        /*table*/
        *{margin: 0;padding: 0;}
        body {
            padding: 40px 100px;
        }
        .demo {
            width: 600px;
            margin: 40px auto;
            font-family: 'trebuchet MS', 'Lucida sans', Arial;
            font-size: 14px;
            color: #444;
        }

        input {
            width: 100px;
        }

        table {
            *border-collapse: collapse; /* IE7 and lower */
            border-spacing: 0;
            width: 100%;
        }
        /*========bordered table========*/
        .bordered {
            border: solid #ccc 1px;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            -webkit-box-shadow: 0 1px 1px #ccc;
            -moz-box-shadow: 0 1px 1px #ccc;
            box-shadow: 0 1px 1px #ccc;
        }

        .bordered tr {
            -o-transition: all 0.1s ease-in-out;
            -webkit-transition: all 0.1s ease-in-out;
            -moz-transition: all 0.1s ease-in-out;
            -ms-transition: all 0.1s ease-in-out;
            transition: all 0.1s ease-in-out;
        }
        .bordered .highlight,
        .bordered tr:hover {
            background: #fbf8e9;
        }
        .bordered td,
        .bordered th {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .bordered th {
            background-color: #dce9f9;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
            background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
            background-image: -moz-linear-gradient(top, #ebf3fc, #dce9f9);
            background-image: -ms-linear-gradient(top, #ebf3fc, #dce9f9);
            background-image: -o-linear-gradient(top, #ebf3fc, #dce9f9);
            background-image: linear-gradient(top, #ebf3fc, #dce9f9);
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#ebf3fc, endColorstr=#dce9f9);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#ebf3fc, endColorstr=#dce9f9)";
            -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
            -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;
            box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
            border-top: none;
            text-shadow: 0 1px 0 rgba(255,255,255,.5);
        }
        .bordered td:first-child,
        .bordered th:first-child {
            border-left: none;
        }
        .bordered th:first-child {
            -moz-border-radius: 6px 0 0 0;
            -webkit-border-radius: 6px 0 0 0;
            border-radius: 6px 0 0 0;
        }
        .bordered th:last-child {
            -moz-border-radius: 0 6px 0 0;
            -webkit-border-radius: 0 6px 0 0;
            border-radius: 0 6px 0 0;
        }
        .bordered tr:last-child td:first-child {
            -moz-border-radius: 0 0 0 6px;
            -webkit-border-radius: 0 0 0 6px;
            border-radius: 0 0 0 6px;
        }
        .bordered tr:last-child td:last-child {
            -moz-border-radius: 0 0 6px 0;
            -webkit-border-radius: 0 0 6px 0;
            border-radius: 0 0 6px 0;
        }
        /*----------------------*/
        .zebra td,
        .zebra th {
            padding: 10px;
            border-bottom: 1px solid #f2f2f2;
        }
        .zebra .alternate,
        .zebra tbody tr:nth-child(even) {
            background: #f5f5f5;
            -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
            -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;
            box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
        }
        .zebra th {
            text-align: left;
            text-shadow: 0 1px 0 rgba(255,255,255,.5);
            border-bottom: 1px solid #ccc;
            background-color: #eee;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
            background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
            background-image: -moz-linear-gradient(top, #f5f5f5, #eee);
            background-image: -ms-linear-gradient(top, #f5f5f5, #eee);
            background-image: -o-linear-gradient(top, #f5f5f5, #eee);
            background-image: linear-gradient(top, #f5f5f5, #eee);
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#f5f5f5, endColorstr=#eeeeee);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#f5f5f5, endColorstr=#eeeeee)";
        }
        .zebra th:first-child {
            -moz-border-radius: 6px 0 0 0;
            -webkit-border-radius: 6px 0 0 0;
            border-radius: 6px 0 0 0;
        }
        .zebra th:last-child {
            -moz-border-radius: 0 6px 0 0;
            -webkit-border-radius: 0 6px 0 0;
            border-radius: 0 6px 0 0;
        }
        .zebra tfoot td {
            border-bottom: 0;
            border-top: 1px solid #fff;
            background-color: #f1f1f1;
        }
        .zebra tfoot td:first-child {
            -moz-border-radius: 0 0 0 6px;
            -webkit-border-radius: 0 0 0 6px;
            border-radius: 0 0 0 6px;
        }
        .zebra tfoot td:last-child {
            -moz-border-radius: 0 0 6px 0;
            -webkit-border-radius: 0 0 6px 0;
            border-radius: 0 0 6px 0;
        }
    </style>
</head>

<body>

<div class="col-md-8 col-md-offset-2">
    <div class="panel rounded shadow">
        <form method="get" action="../user/admin">
            <input class="form-control input-lg no-border" name="keyword" value="{{$keyword}}" placeholder="input keyword here">
            <div class="panel-footer">
                <input type="submit" value="搜索" class="btn btn-success pull-right mt-5">
                <ul class="nav nav-pills">
                    <li><a href="#" ><i class="fa fa-user"></i></a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                    <li><a href="#"><i class="fa fa-camera"></i></a></li>
                    <li><a href="#"><i class="fa fa-smile-o"></i></a></li>
                </ul><!-- /.nav nav-pills -->
            </div><!-- /.panel-footer -->
        </form>

    </div><!-- /.panel -->
    <table class="bordered ">
        <thead>
        <tr>
            <th>user</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th>phone</th>
            <th>website</th>
            <th>is_admin</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="list">
        @foreach($users as $user)
        <form action="../admin/update" method="post">
            {{csrf_token()}}
            <tr class="narrow-table">
                <input type="hidden" name="id" value="{{$user->id}}">
                <td>
                    <span><img src="{{$user->avatar}}" style="width: 3em;height: 3em"></span>
                    {{$user->id}}
                </td>
                <td><span><input name="name" value="{{$user->name}}"></span></td>
                <td><span><input name="email" value="{{$user->email}}"></span></td>
                <td><span><input name="password" value="{{$user->password}}"></span></td>
                <td><span><input name="phone" value="{{$user->phone}}"></span></td>
                <td><span><input name="website" value="{{$user->website}}"></span></td>
                <td><span><input name="is_admin" value="{{$user->is_admin}}"></span></td>
                <td><button type="submit">更新</button></td>
                <td><a href="../user/delete?id={{$user->id}}" type="submit">删除</a></td>
            </tr>
        </form>
        @endforeach
        </tbody>
    </table>

</div>
@include('common.message')
</body>
</html>