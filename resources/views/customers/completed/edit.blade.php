@extends('layouts.app')

@section('content')

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
      <form method="post" action="{{ route('customers.completed.update', $taskNotes2->id) }}">
            @method('PATCH')
          @csrf
          <div class="form-group">
              <label for="description">Task ID:</label>
              <input type="text" class="form-control" name="description" value={{ $taskNotes2->id }} readonly/>
          </div>

          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" value={{ $taskNotes2->description }} />
          </div>

          <div class="form-group">
              <label for="Todo_Due_Date">Todo Due Date:</label>
              <input type="text" class="form-control" name="Todo_Due_Date" value={{ $taskNotes2->Todo_Due_Date }} />
          </div> 

          <div class="form-group">
              <label for="Task_Status">Status:</label>
              <select class="form-control" name="Task_Status">
                            <option value={{ $taskNotes2->Task_Status }}>Complete</option> 
                            <option value="pending">Pending</option>
                    </select>
              
          </div>
          <div class="form-group">
              <label for="Task_Update">Update:</label>
              <input type="text" class="form-control" name="Task_Update" value={{ $taskNotes2->Task_Update }} />
          </div>
          <div class="form-group">
              <label for="Sales_Rep">Handler:</label>
              <input type="text" class="form-control" name="Sales_Rep" value={{ $taskNotes2->Sales_Rep }} />
          </div>
                     
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
      </div>
  </div>
</div>
</div>
    </div>
</div>
@endsection
