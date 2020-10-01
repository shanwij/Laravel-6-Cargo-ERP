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
                <a href="/">
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


            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Manage - {{ $user->name }}</div>

                        <div class="card-body">
                            <form action="{{ route('manage.users.update', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                {{ method_field('PUT')}}

                                @foreach($roles as $role)
                                <div class="fprm-check">
                                    <input class="checkbox-3" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                        {{ $user->hasAnyRole($role->name)?'checked' : '' }}>
                                    <label style="text-transform: capitalize;">{{ $role->name }}</label>
                                </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary" style="margin-top:10px">
                                    Update
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
