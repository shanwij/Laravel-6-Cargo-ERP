@extends('layouts.app')

@section('content')
<div class="context-sidebar">
<div class="nav-sidebar">
        <ul class="sidebar-top-level-items">

            <li class="">
                <a href="{{ route('manage.users.index') }}">
                    <div class="nav-icon-container">
                        <i class="fa fa-home"></i>
                    </div>
                    <span class="nav-item-name">Users</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('manage.notices.index') }}">
                    <div class="nav-icon-container">
                        <i class="fa fa-moon-o"></i>
                    </div>
                    <span class="nav-item-name">Notices</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('manage.events.index') }}">
                    <div class="nav-icon-container">
                        <i class="fa fa-flask"></i>
                    </div>
                    <span class="nav-item-name">Calender</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="content-wrapper">

        <nav class="breadcrumbs container-fluid container-limited" role="navigation">
            <div class="breadcrumbs-container">
                <div class="breadcrumbs-links js-title-container">
                    
                    <ul class="list-unstyled breadcrumbs-list js-breadcrumbs-list">

                        <li>
                            <div class="breadcrumbs-sub-title"><a href="/">Breadcrumbs One</a></div>
                            <span class="mid-b">></span>
                        </li>

                        <li>
                            <div class="breadcrumbs-sub-title"><a href="/">Breadcrumbs Two</a></div>
                            <span class="mid-b">></span>
                        </li>

                        <li>
                            <div class="breadcrumbs-sub-title"><a href="/">Bradcrumbs Three</a></div>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="con-tab">

        <div>
    <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; font-size: 14px;" href="{{ route('manage.events.create')}}" class="btn btn-primary">Add</a>
    </div>  
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-t-1">Title</th>
                        <th scope="col" class="col-t-1">Date</th>
                        <th scope="col" class="col-t-1">Description</th>
                        <th scope="col" class="col-t-1">Updated</th>
                        <th scope="col" colspan="1" class="col-t-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr class="tr-t-1">
                        <td class="tr-t-nm">{{ $event->title}}</td>
                        <td class="tr-t-nm">{{ $event->date }}</td>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{ $event->details }}</td>
                        <td class="tr-t-nm">{{ $event->updated_at }}</td>
                        <th>
                        <a href="{{ route('manage.events.edit', $event->id) }}" class="float-left">
                                <button>
                                    <i class="fa fa-pencil ico-tb"></i>
                                </button>
                            </a>
                            <form action="{{ route('manage.events.destroy', $event->id) }}" method="POST"
                                class="float-left">
                                @csrf {{ method_field('DELETE') }}
                                <button type="submit"><i class="fa fa-trash ico-tb-r"></i></button>
                            </form>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
