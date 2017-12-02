<div class="row clearfix tab-pane fade  active in" id="tab-moments">
    <br/>
    @foreach($items as $item)
        <?php
            $user = $item->belongsToUser()->first();
            $comments = $item->hasManyComments()->get() ;
        ?>
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
                            <span class="text-white h6">{{$item->created_at}}</span>
                        </div>
                    </div>
                </div><!-- /.pull-left -->
                <div class="pull-right">
                    <a href="#" class="text-white h4"><i class="fa fa-heart"></i> {{$item->likes}}</a>
                </div><!-- /.pull-right -->
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-body no-padding">
                <img  src="{{$item->url}}" alt="..." class="img-responsive full-width">
                <div class="inner-all block">
                    view all <a href="#">{{count($comments)}} comments</a>
                </div><!-- /.inner-all -->
                @foreach($comments as $comment)
                    <?php $speaker = $comment->belongsToUser()->first()?>
                <div class="line no-margin"></div><!-- /.line -->
                <div class="media inner-all no-margin">
                    <div class="pull-left">
                        <img src="{{$speaker->avatar}}" alt="..." class="img-post2">
                    </div><!-- /.pull-left -->
                    <div class="media-body">
                        <a href="#" class="h4">{{$speaker->name}}</a>
                        <small class="block text-muted">{{$comment->content}}</small>
                        <em class="text-xs text-muted">Posted on <span class="text-danger">{{$comment->created_at}}</span></em>
                    </div><!-- /.media-body -->
                </div><!-- /.media -->
                @endforeach
            </div><!-- /.panel-body -->
            <div class="panel-footer">
                <form action="../item/comment" class="form-horizontal">
                    <div class="form-group has-feedback no-margin">
                        <input type="hidden" name="item_id" value="{{$item->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input class="form-control" type="text" name="content" placeholder="Your comment here...">
                        <button type="submit" class="btn btn-theme fa fa-search form-control-feedback"></button>
                    </div>
                </form>
            </div><!-- /.panel-footer -->
        </div><!-- /.panel -->
    </div>
    @endforeach
</div>