@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('content')
    <header>
         <div class="container-fluid hidden-xs hidden-ms">
             <div id="myCarousel" class="carousel slide" data-ride="carousel">
                 <!-- Indicators -->
                 <ol class="carousel-indicators">
                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#myCarousel" data-slide-to="1"></li>
                     <li data-target="#myCarousel" data-slide-to="2"></li>
                 </ol>
                 <!-- Wrapper for slides -->
                 <div class="carousel-inner">
                     <div class="item active">
                         <img src="img/slider/android.jpg" alt="Los Angeles">
                     </div>

                     <div class="item">
                         <img src="img/slider/mac.jpg" alt="Chicago">
                     </div>

                     <div class="item">
                         <img src="img/slider/windows.jpg" alt="New York">
                     </div>
                 </div>

                 <!-- Left and right controls -->
                 <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                     <span class="glyphicon glyphicon-chevron-left"></span>
                     <span class="sr-only">Previous</span>
                 </a>
                 <a class="right carousel-control" href="#myCarousel" data-slide="next">
                     <span class="glyphicon glyphicon-chevron-right"></span>
                     <span class="sr-only">Next</span>
                 </a>
             </div>
         </div>
    </header>
    <div class="content-wrapper1 hidden-xs hidden-ms">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="contentInner1">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <form action="#" method="#" role="search" class="form-horizontal">
                                    <div class="input-group">
                                        <div class="input-group-btn search-panel">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span id="search_concept">Filter by</span> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#contains">All Dates</a></li>
                                                <li><a href="#its_equal">Today</a></li>
                                                <li><a href="#greather_than">Tomorrow</a></li>
                                                <li><a href="#less_than">This week</a></li>
                                                <li><a href="#less_than">This weekend</a></li>
                                                <li><a href="#less_than">Next week</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#all">Next month</a></li>
                                            </ul>
                                        </div>
                                        <input type="hidden" name="search_param" value="all" id="search_param">
                                        <input type="text" class="form-control" name="x" placeholder="Search event" id="search-data">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" ><span class="glyphicon glyphicon-search" style="padding: 4px"></span></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
    </div>
    <div class="content-layout" style="margin-top: 20px;" id="display">
        <div class="container-fluid">
            <div class="row"  id="display">
                    @foreach($events as $event)
                    <div class="col-md-3 col-ms-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="blog-img" >
                                    <img src="image/{{$event->image}}" class="img-responsive img-thumbnail" style="width:600px;height:180px">
                                </div>
                                <div class="blog-text" style="line-height:70%;padding-top:15px">
                                   <p style="color:green;" >{{$event->time_start}}</p>
                                    <a href="event/page/{{$event->id}}"> <h4 style="font-weight: bold">{{$event->title}}</h4></a>
                                    <h5 style="font-weight: bold">{{$event->location}}</h5>
                                </div>
                            </div>
                            <div class="panel-footer ">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4 col-xs-offset-2 col-xs-4">
                                        <a href="" title="share"><i class="fa fa-share-square-o" aria-hidden="true" style="font-size:20px;color:green"></i> share</a>
                                    </div>
                                    <div class="col-md-4 col-xs-4">
                                        <a href="" title="save"> <i class="fa fa-bookmark" aria-hidden="true" style="font-size:20px;color:blue"></i> save</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')
    <script type="text/javascript">
        $(function (){
            var hrx=null;
            $('#search-data').on('keyup', function () {
                var self = $(this);
                if(self==null){

                }
                else {
                    if(hrx){
                      hrx.abort();
                    }
                   hrx=$.ajax({
                        type: 'POST',
                        url: '{{ route('search-data') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            key: self.val()
                        },
                        success: function (response){
                            var html = '';
                            $.each(response.data, function(key, val){
                                html += '<div class="content-layout" style="margin-top: 20px;">'+
                                    '<div class="container-fluid">'+
                                            '<div class="row">'+
                                                '<div class="col-md-8 col-md-offset-2">'+
                                                    '<div class="panel panel-default">'+
                                                        '<div class="panel-body">'+
                                                            '<div class="blog-img">'+
                                                                '<img src="image/' + val.image + '"'+ 'class="img-responsive img-thumbnail" style="width:820px;height: 250px">'+
                                                                '</div>'+
                                                                '<div class="blog-text" style="line-height:70%;padding-top:15px">'+
                                                                '<p style="color:green;" >'+val.time_start+'</p>'+
                                                                '<a href="event/page/{{$event->id}}">'+
                                                                    '<h4 style="font-weight: bold">'+val.title+'</h4>'+
                                                                '</a>'+
                                                                '<h5 style="font-weight: bold">'+val.location+'</h5>'+
                                                                '</div>'+
                                                                '</div>'+
                                                                '<div class="panel-footer">'+
                                                                '<div class="blog-img">'+

                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'
                                    +'</div>'

                            });

                            $('#display').html(html);
                        },
                        error: function () {

                        }

                    })

                }

            });
        })
    </script>
@endsection