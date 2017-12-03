<div class="row clearfix tab-pane fade" id="tab-album">
    <div class="panel rounded shadow">
        <form method="get" action="../album/create">
            <input class="form-control input-lg no-border" name="title" rows="1" placeholder="input album title here...">
            <input class="form-control input-lg no-border" name="label" rows="1" placeholder="input album label here...">
            <input class="form-control input-lg no-border" name="description" rows="2" placeholder="input album description here...">
            <div class="panel-footer">
                <input type="submit" class="btn btn-success pull-right mt-5">
                <ul class="nav nav-pills">
                    <li><a href="#" ><i class="fa fa-user"></i></a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                    <li><a href="#"><i class="fa fa-camera"></i></a></li>
                    <li><a href="#"><i class="fa fa-smile-o"></i></a></li>
                </ul><!-- /.nav nav-pills -->
            </div><!-- /.panel-footer -->
        </form>

        @foreach($albums as $album)
            <div class="col-md-6 " >
                <div class="panel panel-success rounded shadow">
                    <div class="panel-heading no-border">
                        <div class="pull-left half">
                            <div class="media">
                                <div class="media-object pull-left">
                                    <img src="{{$user->avatar}}" alt="..." class="img-circle img-post">
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading block mb-0 h4 text-white">{{$user->name}}</a>
                                    <span class="text-white h6">{{$user->created_at}}</span>
                                </div>
                            </div>
                        </div><!-- /.pull-left -->
                        <div class="pull-right">
                            <a href="#" class="text-white h4">
                                <i class="fa fa-heart"></i>
                                {{$album->likes}}
                            </a>
                        </div><!-- /.pull-right -->
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->

                    <div class="panel-body no-padding">
                        <img  src="{{$album->background}}" alt="..." class="img-responsive full-width">
                        <div class="inner-all block">
                            view all <a href="#">{{$album->comments}} comments</a>
                        </div><!-- /.inner-all -->
                    </div><!-- /.panel-body -->

                    <div class="panel-footer">
                        <div class="form-group has-feedback no-margin">
                            <a href="../album/delete?album_id={{$album->id}}" class="btn btn-primary btn-lg" title="删除相册及所含图片">删除相册</a>
                            <a href="../home/index?album_id={{$album->id}}" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">查看图片</a>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#upload{{$album->id}}">上传图片</button>
                            <!-- 模态框（Modal） -->
                            <div class="modal fade" id="upload{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="container">
                                            <div class="col-md-6">
                                                <form class="form-group" method="post" action="../item/save" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <label>Upload Image</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-default btn-file">
                                                                Browse… <input type="file" name="picture" id="imgInp">
                                                            </span>
                                                            <input type="hidden" name="album_id" value="{{$album->id}}">
                                                        </span>
                                                        <input type="text" class="form-control" readonly>
                                                    </div>
                                                    <img id='img-upload'/>
                                                    <input type="submit">
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal -->
                            </div>
                        </div>
                    </div><!-- /.panel-footer -->
                </div><!-- /.panel -->
            </div>

        @endforeach

    </div><!-- /.panel -->
</div>