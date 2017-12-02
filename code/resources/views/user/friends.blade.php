<div class="row clearfix tab-pane fade" id="tab-friends">
    <form method="get" action="../album/create">
        <input class="form-control input-lg no-border" name="email" rows="1" placeholder="input name or email you wanna watch...">
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
        @foreach($friends as $friend)
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
                    <span class="label label-danger">Common User</span>
                </div>
            </div>
        </li>
        @endforeach
        <li class="col-md-6">
            <div class="img">
                <img class="img-thumbnail" src="https://lorempixel.com/400/400/people/2/" alt="">
            </div>
            <div class="details">
                <div class="name">
                    <a href="#">Mila Kunis</a>
                </div>
                <div class="time online">
                    <i class="fa fa-check-circle"></i> Online
                </div>
                <div class="type">
                    <span class="label label-warning">Pending</span>
                </div>
            </div>
        </li>
        <li class="col-md-6">
            <div class="img">
                <img class="img-thumbnail" src="https://lorempixel.com/400/400/people/3/" alt="">
            </div>
            <div class="details">
                <div class="name">
                    <a href="#">Ryan Gossling</a>
                </div>
                <div class="time online">
                    <i class="fa fa-check-circle"></i> Online
                </div>
            </div>
        </li>
        <li class="col-md-6">
            <div class="img">
                <img class="img-thumbnail" src="https://lorempixel.com/400/400/people/4/" alt="">
            </div>
            <div class="details">
                <div class="name">
                    <a href="#">Robert Downey Jr.</a>
                </div>
                <div class="time">
                    <i class="fa fa-clock-o"></i> Last online: Thursday
                </div>
            </div>
        </li>
        <li class="col-md-6">
            <div class="img">
                <img  class="img-thumbnail" src="https://lorempixel.com/400/400/people/5/" alt="">
            </div>
            <div class="details">
                <div class="name">
                    <a href="#">Emma Watson</a>
                </div>
                <div class="time">
                    <i class="fa fa-clock-o"></i> Last online: 1 week ago
                </div>
            </div>
        </li>
        <li class="col-md-6">
            <div class="img">
                <img  class="img-thumbnail" src="https://lorempixel.com/400/400/people/6/"  alt="">
            </div>
            <div class="details">
                <div class="name">
                    <a href="#">George Clooney</a>
                </div>
                <div class="time">
                    <i class="fa fa-clock-o"></i> Last online: 1 month ago
                </div>
            </div>
        </li>
        <li class="col-md-6">
            <div class="img">
                <img  class="img-thumbnail" src="https://lorempixel.com/400/400/people/6/"  alt="">
            </div>
            <div class="details">
                <div class="name">
                    <a href="#">Mila Kunis</a>
                </div>
                <div class="time online">
                    <i class="fa fa-check-circle"></i> Online
                </div>
                <div class="type">
                    <span class="label label-warning">Pending</span>
                </div>
            </div>
        </li>
        <li class="col-md-6">
            <div class="img">
                <img  class="img-thumbnail" src="https://lorempixel.com/400/400/people/7/"  alt="">
            </div>
            <div class="details">
                <div class="name">
                    <a href="#">Ryan Gossling</a>
                </div>
                <div class="time online">
                    <i class="fa fa-check-circle"></i> Online
                </div>
            </div>
        </li>
    </ul>
    <br>
    <a href="#" class="btn btn-success pull-right">View all users</a>
</div>