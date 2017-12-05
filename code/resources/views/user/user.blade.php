<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
<div class="col-md-8 col-md-offset-2">
    <div class="container-fluid container-limited limit-container-width">
        <div class="content" id="content-body">

            <form class="edit-user prepend-top-default js-quick-submit" role="form" id="edit_user_1515613" enctype="multipart/form-data" action="../user/update" accept-charset="UTF-8" method="post">
                {{ csrf_field() }}
                <input name="id" type="hidden" value="{{$user->id}}">
                <div class="row">
                    <div class="col-lg-4 profile-settings-sidebar">
                        <h4 class="prepend-top-0">
                            Public Avatar
                        </h4>
                        <p>
                            You can upload an avatar here
                            or change it at
                            <a href="http://gravatar.com">gravatar.com</a>
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <div class="clearfix avatar-image append-bottom-default">
                            <a target="_blank" rel="noopener noreferrer" href="{{$user->avatar}}">
                                <img alt="" class="avatar s160 js-lazy-loaded" src="{{$user->avatar}}">
                            </a>
                        </div>
                        <h5 class="prepend-top-0">
                            Upload new avatar
                        </h5>
                        <div class="prepend-top-5 append-bottom-10">
                            <input class="js-user-avatar-input" accept="image/*" type="file" name="avatar" id="avatar">
                        </div>
                        <div class="help-block">
                            The maximum file size allowed is 200KB.
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 profile-settings-sidebar">
                        <h4 class="prepend-top-0">
                            Main settings
                        </h4>
                        <p>
                            This information will appear on your profile.
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label class="label-light required" for="name">Name</label>
                                <input required="required" class="form-control" type="text" value="{{$user->name}}" name="name" id="name">
                                <span class="help-block">Enter your name, so people you know can recognize you.</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label-light" for="id">User ID</label>
                                <input readonly="readonly" class="form-control" type="text" value="{{$user->id}}" name="id" id="id">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-light required" for="email">Email</label>
                            <input required="required" value="{{$user->email}}" class="form-control" type="text" name="email" id="email">
                            <span class="help-block">We also use email for avatar detection if no avatar is uploaded.</span>
                        </div>
                        <div class="form-group">
                            <label class="label-light" for="phone">Phone</label>
                            <input class="form-control" type="text" value="{{$user->phone}}" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label class="label-light" for="website">website</label>
                            <input class="form-control" type="text" value="{{$user->website}}" name="website" id="website">
                        </div>
                        <div class="form-group"><label class="label-light" for="user_bio">Bio</label>
                            <textarea rows="4" maxlength="250" class="form-control" name="description" id="user_bio">
                                {{$user->description}}
                            </textarea>
                            <span class="help-block">Tell us about yourself in fewer than 250 characters.</span>
                        </div>
                        <div class="prepend-top-default append-bottom-default">
                            <input type="submit" name="commit" value="Update profile settings" class="btn btn-success">
                            <a class="btn btn-cancel" href="../user/me">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="modal modal-profile-crop" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" type="button">
<span>
×
</span>
                            </button>
                            <h4 class="modal-title">
                                Position and size your new avatar
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="profile-crop-image-container">
                                <img alt="Avatar cropper" class="modal-profile-crop-image" src="">
                            </div>
                            <div class="crop-controls">
                                <div class="btn-group">
                                    <button class="btn btn-primary" data-method="zoom" data-option="0.1">
                                        <span class="fa fa-search-plus"></span>
                                    </button>
                                    <button class="btn btn-primary" data-method="zoom" data-option="-0.1">
                                        <span class="fa fa-search-minus"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary js-upload-user-avatar" type="button">
                                Set new profile picture
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('common.message')
</body>
</html>