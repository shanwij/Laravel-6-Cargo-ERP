@extends('layouts.app')

@section('content')
<div class="context-sidebar">
    <div class="nav-sidebar">
        <ul class="sidebar-top-level-items">

            <li class="">
                <a href="/">
                    <div class="nav-icon-container">
                        <i class="fa fa-home"></i>
                    </div>
                    <span class="nav-item-name">Users</span>
                </a>
            </li>

            <li class="">
                <a href="/">
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

            <li class="">
                <a href="/">
                    <div class="nav-icon-container">
                        <i class="fa fa-flask"></i>
                    </div>
                    <span class="nav-item-name">Reports</span>
                </a>
            </li>

            <li class="">
                <a href="/">
                    <div class="nav-icon-container">
                        <i class="fa fa-flask"></i>
                    </div>
                    <span class="nav-item-name">Database</span>
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

        DATABASE

    </div>
</div>
@endsection
