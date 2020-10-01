@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div style="float:left; width:50%">
    <div class="row justify-content-center" style="margin-top:20px; margin-right:1px">
        <div class="col">
            <div class="card">
                <div class="card-header">Announcements</div>

                <div class="card-body" style="padding-bottom:10px;">
                @foreach ($notices as $notice) 
                <h5>{{$notice->title}}</h5>
                <p>{{$notice->desc}}</p>
                @endforeach
                </div>

            </div>
        </div>
    </div>
    </div>
    <div style="float:right; width: 50%">
    <div class="row justify-content-center home-1" style="margin-top:20px;">
        <div class="col">
            <div class="card">
                <div class="card-header">Upcoming Events</div>

                <div class="card-body" style="padding-bottom:10px">
                @foreach ($events as $event) 
                <h5>{{$event->title}}</h5>
                <p>{{$event->date}}</p>
                <p>{{$event->details}}</p>
                @endforeach
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
@endsection
