<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/25
 * Time: 10:17
 */
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Profile with tabs like facebook page - Bootdey.com</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="../js/jquery.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <style type="text/css">
                body{margin-top:20px;
                    background:#eee;
                }

                .divider {
                    height: 20px;
                    display: block;
                }

                /* ========================================================================
                 * FORM MISC
                 * ======================================================================== */
                .input-group-addon {
                    -moz-border-radius: 0px;
                    -webkit-border-radius: 0px;
                    border-radius: 0px;
                    min-width: 39px;
                }
                .input-group-addon .ckbox, .input-group-addon .rdio {
                    position: absolute;
                    top: 4px;
                    left: 10px;
                }

                .input-group-lg > .form-control, .input-group-lg > .input-group-addon, .input-group-lg > .input-group-btn > .btn, .input-group-sm > .form-control, .input-group-sm > .input-group-addon, .input-group-sm > .input-group-btn > .btn, .input-group-xs > .form-control, .input-group-xs > .input-group-addon, .input-group-xs > .input-group-btn > .btn {
                    -moz-border-radius: 0px;
                    -webkit-border-radius: 0px;
                    border-radius: 0px;
                }

                .input-sm, .form-group-sm .form-control {
                    -moz-border-radius: 0px;
                    -webkit-border-radius: 0px;
                    border-radius: 0px;
                }

                .form-control {
                    -moz-border-radius: 0px;
                    -webkit-border-radius: 0px;
                    border-radius: 0px;
                    -moz-box-shadow: none;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                }

                @media (max-width: 640px) {
                    .form-inner-all [class*="col-"]:last-child .form-control {
                        margin-top: 15px;
                    }
                }


                /* ========================================================================
                 * PROFILE
                 * ======================================================================== */
                .profile-cover {
                    width: 100%;
                }
                .profile-cover .cover {
                    position: relative;
                    border: 10px solid #FFF;
                }
                .profile-cover .cover .inner-cover {
                    overflow: hidden;
                    height: auto;
                }
                .profile-cover .cover .inner-cover img {
                    border: 1px solid transparent;
                    text-align: center;
                    width: 100%;
                }
                .profile-cover .cover .inner-cover .cover-menu-mobile {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                }
                .profile-cover .cover .inner-cover .cover-menu-mobile button i {
                    font-size: 17px;
                }
                .profile-cover .cover ul.cover-menu {
                    padding-left: 150px;
                    position: absolute;
                    overflow: hidden;
                    left: 1px;
                    float: left;
                    bottom: 0px;
                    width: 100%;
                    margin: 0px;
                    background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.24);
                }
                .profile-cover .cover ul.cover-menu li {
                    display: block;
                    float: left;
                    margin-right: 0px;
                    padding: 0px 10px;
                    line-height: 40px;
                    height: 40px;
                    -moz-transition: all 0.3s;
                    -o-transition: all 0.3s;
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                }
                .profile-cover .cover ul.cover-menu li:hover {
                    background-color: rgba(0, 0, 0, 0.44);
                }
                .profile-cover .cover ul.cover-menu li.active {
                    background-color: rgba(0, 0, 0, 0.64);
                }
                .profile-cover .cover ul.cover-menu li a {
                    color: #FFF;
                    font-weight: bold;
                    display: block;
                    height: 40px;
                    line-height: 40px;
                    text-decoration: none;
                }
                .profile-cover .cover ul.cover-menu li a i {
                    font-size: 18px;
                }
                .profile-cover .profile-body {
                    margin: 0px auto 10px;
                    position: relative;
                }
                .profile-cover .profile-timeline {
                    padding: 15px;
                }
                .img-post{
                    width:30px;
                    height:30px;
                }
                .img-post2{
                    width:50px;
                    height:50px;
                }
            </style>
            <link href="../css/upload.css" rel="stylesheet">
            <script src="../js/upload.js"></script>
        </head>
        <body>

        <div class="container bootstrap snippets">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="panel rounded shadow">
                        <div class="panel-body">
                            <div class="inner-all">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                        <img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="{{$user->avatar}}" alt="{{$user->name}}">
                                    </li>
                                    <li class="text-center">
                                        <h4 class="text-capitalize">{{$user->name}}</h4>
                                        <p class="text-muted text-capitalize">{{$user->description}}</p>
                                    </li>
                                    <li>
                                        <a href="../user/admin" class="btn btn-success text-center btn-block">PRO Account</a>
                                    </li>
                                    <li><br></li>
                                    <li>
                                        <div class="btn-group-vertical btn-block">
                                            <a href="../user/me" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Edit Account</a>
                                            <a href="../user/logout" class="btn btn-default"><i class="fa fa-sign-out pull-right"></i>Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.panel -->

                    <div class="panel panel-theme rounded shadow">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class="panel-title">Contact</h3>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-sm btn-success"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="btn btn-sm btn-success"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="btn btn-sm btn-success"><i class="fa fa-google-plus"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body no-padding rounded">
                            <ul class="list-group no-margin">
                                <li class="list-group-item"><i class="fa fa-envelope mr-5"></i> {{$user->email}}</li>
                                <li class="list-group-item"><i class="fa fa-globe mr-5"></i>
                                    @if(empty($user->website))
                                        no website
                                    @else
                                    {{$user->website}}
                                    @endif
                                </li>
                                <li class="list-group-item"><i class="fa fa-phone mr-5"></i>
                                    @if(empty($user->phone))
                                        no phone
                                    @else
                                        {{$user->phone}}
                                    @endif
                                </li>
                            </ul>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->

                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 tabs-wrapper">
                    <div class="profile-cover">
                        <div class="cover rounded shadow no-overflow">
                            <div class="inner-cover">
                                <!-- Start offcanvas btn group menu: This menu will take position at the top of profile cover (mobile only). -->
                                <div class="btn-group cover-menu-mobile hidden-lg hidden-md">
                                    <button type="button" class="btn btn-theme btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right no-border nav nav-tabs" role="menu">
                                        <li class="active">
                                            <a href="#tab-moments" data-toggle="tab">
                                                <i class="fa fa-fw fa-clock-o"></i>
                                                <span>moments</span>
                                            </a>
                                        </li>
                                        <li><a href="#tab-recommend" data-toggle="tab"><i class="fa fa-fw fa-refresh"></i> <span>watched</span></a></li>
                                        <li><a href="#tab-friends" data-toggle="tab"><i class="fa fa-fw fa-user"></i> <span>Friends</span></a></li>
                                        <li><a href="#tab-activity" data-toggle="tab"><i class="fa fa-fw fa-photo"></i> <span>Activities</span> <small></small></a></li>
                                        <li><a href="#tab-photo" data-toggle="tab"><i class="fa fa-fw fa-photo"></i> <span>Photos</span> <small></small></a></li>
                                        <li><a href="#tab-album" data-toggle="tab"><i class="fa fa-fw fa-folder-open-o"></i> <span>Albums</span> <small></small></a></li>
                                    </ul>
                                </div>
                                <img  src="../storage/pictures/72f5ddc0cb4079bbbc1f9063e08a7794.jpg" class="img-responsive full-width" alt="cover" style="max-height:200px;">
                            </div>
                            <ul class="list-unstyled no-padding hidden-sm hidden-xs cover-menu">
                                <li class="active">
                                    <a href="#tab-moments" data-toggle="tab">
                                        <i class="fa fa-fw fa-clock-o"></i>
                                        <span>moments</span>
                                    </a>
                                </li>
                                <li><a href="#tab-recommend" data-toggle="tab"><i class="fa fa-fw fa-refresh"></i> <span>watched</span></a></li>
                                <li><a href="#tab-friends" data-toggle="tab"><i class="fa fa-fw fa-user"></i> <span>Friends</span></a></li>
                                <li><a href="#tab-activity" data-toggle="tab"><i class="fa fa-fw fa-photo"></i> <span>Activities</span> <small></small></a></li>
                                <li><a href="#tab-photo" data-toggle="tab"><i class="fa fa-fw fa-photo"></i> <span>Photos</span> <small></small></a></li>
                                <li><a href="#tab-album" data-toggle="tab"><i class="fa fa-fw fa-folder-open-o"></i> <span>Albums</span> <small></small></a></li>

                            </ul>
                        </div><!-- /.cover -->
                    </div><!-- /.profile-cover -->
                    <div class="divider"></div>

                    <div class="tab-content tab-content-body">
                        @include('user.album')
                        @include('user.activity')
                        @include('user.friends')
                        @include('user.moments')
                        @include('user.photo')
                        @include('user.watched')
                    </div>


                </div>
            </div>

        </div>

        <script src="../js/bootstrap.min.js"></script>
        @include('common.message')
        </body>
        </html>
