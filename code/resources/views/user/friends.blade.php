<div class="row clearfix tab-pane fade" id="tab-friends">
    <form method="get" action="../watch/watch">
        <input class="form-control input-lg no-border" name="keyword" rows="1" placeholder="input name or email you wanna watch...">
        <input class="form-control input-lg no-border" name="label" rows="1" placeholder="plz choose a label...">
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
    <br/>
    <ul class="widget-users row">
        @foreach($friends as $f)
            <?php $friend = $f->belongsToUser()->first() ;?>
        <li class="col-md-6">
            <div class="img">
                <img class="img-thumbnail" src="{{$friend->avatar}}" alt="">
            </div>
            <div class="details">
                <div class="name">
                    <a href="#">{{$friend->name}}</a>
                </div>
                <div class="time">
                    <i class="fa fa-clock-o"></i> Last online: {{$friend->updated_at}}
                </div>
                <div class="type">
                    <span class="label label-danger">
                        @if($friend->is_admin)
                            <span class="label label-warning">Admin</span>
                        @else
                            <span class="label label-warning">User</span>
                        @endif
                    </span>
                </div>
            </div>
        </li>
        @endforeach

    </ul>
    <br>
    <a href="#" class="btn btn-success pull-right">View all users</a>
</div>