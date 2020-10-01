@extends('layouts.app')

@section('content')

<div class="context-sidebar">
    <div class="nav-sidebar">
    <ul class="sidebar-top-level-items">

<li class="">
    <a href="{{ route('customers.opportunities.index') }}">
        <div class="nav-icon-container">
            <i class="fa fa-home"></i>
        </div>
        <span class="nav-item-name">Opportunities</span>
    </a>
</li>

<li class="">
    <a href="{{ route('customers.leads.index') }}">
        <div class="nav-icon-container">
            <i class="fa fa-moon-o"></i>
        </div>
        <span class="nav-item-name">Leads</span>
    </a>
</li>

<li class="">
    <a href="{{ route('customers.won.index') }}">
        <div class="nav-icon-container">
            <i class="fa fa-flask"></i>
        </div>
        <span class="nav-item-name">Customers</span>
    </a>
</li>

<li class="">
    <a href="{{ route('customers.tasks.index') }}">
        <div class="nav-icon-container">
            <i class="fa fa-flask"></i>
        </div>
        <span class="nav-item-name">Tasks</span>
    </a>
</li>

<li class="">
    <a href="{{ route('customers.completed.index') }}">
        <div class="nav-icon-container">
            <i class="fa fa-flask"></i>
        </div>
        <span class="nav-item-name">Completed Tasks</span>
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
            <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; margin-right: 4px; font-size: 14px;" href="{{ url('customers/completed/index/pdf') }}" class="btn btn-danger">PDF</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-t-1">ID</th>
                        <th scope="col" class="col-t-1">Company</th>
                        <th scope="col" class="col-t-1">Task</th>
                        <th scope="col" class="col-t-1">Deadline</th>
                        <th scope="col" class="col-t-1">Update</th>
                        <th scope="col" class="col-t-1">Handler</th>
                        <th scope="col" class="col-t-1">Last Updated</th>
                        <th scope="col" class="col-t-1">Status</th>
                        <th scope="col" class="col-t-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taskNotes2 as $taskNotes2)
                    <tr class="tr-t-1">
                        <td class="tr-t-nm">{{$taskNotes2->id}}</td>
                        <td class="tr-t-nm">{{$taskNotes2->contact['Company']}}</td>
                        <td class="tr-t-nm">{{$taskNotes2->description}}</td>
                        <td class="tr-t-nm">{{$taskNotes2->Todo_Due_Date}}</td>
                        <td class="tr-t-nm">{{$taskNotes2->Task_Update}}</td>
                        <td class="tr-t-nm">{{$taskNotes2->Sales_Rep}}</td>
                        <td class="tr-t-nm">{{$taskNotes2->updated_at}}</td>
                        <td class="tr-t-nm">{{$taskNotes2->Task_Status}}</td>
                        <th>
                            <a href="{{ route('customers.completed.edit', $taskNotes2->id) }}" class="float-left">
                                <button>
                                    <i class="fa fa-pencil ico-tb"></i>
                                </button>
                            </a>
                            <form action="{{ route('customers.completed.destroy', $taskNotes2->id) }}" method="POST"
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

