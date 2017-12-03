<div class="row clearfix tab-pane fade" id="tab-activity">
    <div class="panel rounded shadow">
        <form method="get" action="../activity/save">
            <textarea class="form-control input-lg no-border" name="name" rows="1" placeholder="input activity title here..."></textarea>
            <input class="form-control input-lg no-border" name="date" type="datetime-local" placeholder="input activity time">
            <textarea class="form-control input-lg no-border" name="description" rows="2" placeholder="input activity description here..."></textarea>
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

    </div><!-- /.panel -->
    @foreach($activities as $activity)
        <?php
        $owner = $activity->belongsToUser()->first();
        $attendances = $activity->hasManyAttendances()->get();
        ?>
        <div class="col-md-6 " >
            <div class="panel panel-success rounded shadow">
                <div class="panel-heading no-border">
                    <div class="pull-left half">
                        <div class="media">
                            <div class="media-object pull-left">
                                <img src="{{$owner->avatar}}" alt="..." class="img-circle img-post">
                            </div>
                            <div class="media-body">
                                <a href="#" class="media-heading block mb-0 h4 text-white">{{$owner->name}}</a>
                                <span class="text-white h6">{{$activity->created_at}}</span>
                            </div>
                            <div>
                                <blockquote><h1>{{$activity->name}}</h1></blockquote>
                                <blockquote><p>{{$activity->description}}</p></blockquote>
                            </div>
                        </div>
                    </div><!-- /.pull-left -->
                    <div class="clearfix"></div>
                    @foreach($attendances as $attendance)
                        <?php $speaker = $attendance->belongsToUser()->first(); ?>
                        <div class="line no-margin"></div><!-- /.line -->
                        <div class="media inner-all no-margin">
                            <div class="pull-left">
                                <img src="{{$speaker->avatar}}" alt="..." class="img-post2">
                            </div><!-- /.pull-left -->
                            <div class="media-body">
                                <a href="#" class="h4">{{$speaker->name}}</a>
                                <em class="text-xs text-muted">Joined on <span class="text-danger">{{$attendance->created_at}}</span></em>
                            </div><!-- /.media-body -->
                        </div><!-- /.media -->
                    @endforeach
                    <div class="pull-right">
                        <a href="../activity/attendant?activity_id={{$activity->id}}" class="text-white h4"><i class="fa fa-heart"></i> {{$activity->likes}}</a>
                    </div><!-- /.pull-right -->
                    <div class="clearfix"></div>
                    <div class="form-group has-feedback no-margin">
                        @if($user->id==$activity->owner_id)
                        <a href="../activity/delete?activity_id={{$activity->id}}" class="btn btn-primary btn-lg" title="删除活动">删除活动</a>

                        @else
                            <a href="#" class="btn btn-primary btn-lg" title="删除活动">无权操作</a>
                        @endif
                    </div>
                </div><!-- /.panel-heading -->

            </div><!-- /.panel -->
        </div>
    @endforeach
</div>