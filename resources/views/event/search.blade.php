<div class="content-layout" style="margin-top: 20px;">
    <div class="container-fluid">
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-3 col-ms-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="blog-img" >
                                <img src="image/{{$event->image}}" class="img-responsive img-thumbnail" style="width:400px;height: 150px">
                            </div>
                            <div class="blog-text" style="line-height:70%;padding-top:15px">
                                <p style="color:green;" >{{$event->time_start}}</p>
                                <a href="event/page/{{$event->id}}"> <h4 style="font-weight: bold">{{$event->title}}</h4></a>
                                <h5 style="font-weight: bold">{{$event->location}}</h5>
                            </div>
                        </div>
                        <div class="panel-footer ">
                            <div class="row">
                                <div class="col-md-offset-8 col-md-1">
                                    <a href="" title="share"><i class="fa fa-share-square-o" aria-hidden="true" style="font-size:20px;color:green"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <a href="" title="save"> <i class="fa fa-bookmark" aria-hidden="true" style="font-size:20px;color:blue"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>