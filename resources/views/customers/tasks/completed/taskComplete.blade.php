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
    <a href="/">
        <div class="nav-icon-container">
            <i class="fa fa-flask"></i>
        </div>
        <span class="nav-item-name">Reports</span>
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
<!------------------------------------------------->
        
<div>
    <a style="margin: 19px;" href="{{ route('customers.tasks.index') }}" class="btn btn-primary">Pending tasks</a>
</div>     

        <div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Notes | Completed </h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Contact</td>
          <td>Notes</td>
          <td>Description</td>
          <td>Todo Due Date</td>
          <td>Date</td>
          <td>Task status</td>
          <td>Task update</td>
          <td>Sales rep</td>
          <td colspan = 1>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($taskNotes2 as $taskNotes2)
        <tr>
            <td>{{$taskNotes2->id}}</td>
            <td>{{$taskNotes2->Contact}}</td>
            <td>{{$taskNotes2->Notes}}</td>
            <td>{{$taskNotes2->description}}</td>
            <td>{{$taskNotes2->Todo_Due_Date}}</td>
            <td>{{$taskNotes2->Date}}</td>
            <td>{{$taskNotes2->Task_Status}}</td>
            <td>{{$taskNotes2->Task_Update}}</td>
            <td>{{$taskNotes2->Sales_Rep}}</td>
            <td>
                <form action="{{ route('customers.tasks.destroy', $taskNotes2->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
    <!------------------------------------------------------------------>

    <div class="col-sm-12">

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div>
@endif
</div>


    </div>
</div>
@endsection
