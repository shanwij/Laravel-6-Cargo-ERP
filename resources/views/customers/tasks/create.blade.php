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
<!------------------------------------------------->


<div class="con-form" style="margin:20px 34px 0 34px">
<div class="row">
<div class="col">
  <div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
      <form method="post" action="{{ route('customers.tasks.store') }}">
          @csrf
          <div class="form-group">
              <label for="Contact">Contact Name:</label>
              <select class="form-control" name="cus_id">
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->Company }}</option>    
                    @endforeach   
              </select>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" value="{{ old('description') }}" />
          </div>
          <div class="form-group">
              <label for="Todo_Due_Date">Todo Due Date:</label>
              <input type="date" class="form-control" name="Todo_Due_Date" value="{{ old('Todo_Due_Date') }}" />
          </div>
          <div class="form-group">
              <label for="Task_Status">Status:</label>
                    <select class="form-control" name="Task_Status">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                    </select>
          </div>
          <div class="form-group">
              <label for="Task_Update">Task Update:</label>
              <input type="text" class="form-control" name="Task_Update" value="{{ old('Task_Update') }}" />
          </div>
          <div class="form-group">
              <label for="Sales_Rep">Sales Rep:</label>
              <input type="text" class="form-control" name="Sales_Rep" value="{{ old('Sales_Rep') }}" />
          </div>          
          <button type="submit" class="btn btn-primary">Add Task</button>
      </form>
      </div>
  </div>
</div>
</div>



    </div>
</div>
@endsection
