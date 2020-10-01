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

<!------------------------------------------------------------------------->
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
        <form method="post" action="{{ route('customers.won.update', $wonContact->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">    
              <label for="Contact_First">First Name:</label>
              <input type="text" class="form-control" name="Contact_First" value={{ $wonContact->Contact_First }} />
          </div>

          <div class="form-group">
              <label for="Contact_Last">Last Name:</label>
              <input type="text" class="form-control" name="Contact_Last" value={{ $wonContact->Contact_Last }} />
          </div>

          <div class="form-group">
              <label for="Email">Email:</label>
              <input type="text" class="form-control" name="Email" value={{ $wonContact->Email }} />
          </div>
          <div class="form-group">
              <label for="Phone">Phone:</label>
              <input type="text" class="form-control" name="Phone" value={{ $wonContact->Phone }} />
          </div>
          <div class="form-group">
              <label for="Company">Company:</label>
              <input type="text" class="form-control" name="Company" value={{ $wonContact->Company }} />
          </div>
          <div class="form-group">
              <label for="Company">Address No:</label>
              <input type="text" class="form-control" name="Address" value={{ $wonContact->Address }} />
          </div>
          <div class="form-group">
              <label for="Company">Street:</label>
              <input type="text" class="form-control" name="Address_Street_1" value={{ $wonContact->Address_Street_1 }} />
          </div>
          <div class="form-group">
              <label for="Company">City:</label>
              <input type="text" class="form-control" name="Address_City" value={{ $wonContact->Address_City }} />
          </div>
          <div class="form-group">
              <label for="Company">State:</label>
              <input type="text" class="form-control" name="Address_State" value={{ $wonContact->Address_State }} />
          </div>
          <div class="form-group">
              <label for="Company">Zip code:</label>
              <input type="text" class="form-control" name="Address_Zip" value={{ $wonContact->Address_Zip }} />
          </div>
          <div class="form-group">
              <label for="Company">Country:</label>
              <input type="text" class="form-control" name="Address_Country" value={{ $wonContact->Address_Country }} />
          </div>
          <div class="form-group">
              <label for="Company">Quotation Due Date:</label>
              <input type="text" class="form-control" name="Proposal_Due_Date" value={{ $wonContact->Proposal_Due_Date }} />
          </div>

          <div class="form-group">
              <label for="Status">Status:</label>
              <select class="form-control" name="Status">
                            <option value={{ $wonContact->Status }}>Won</option> 
                            <option value="leads">Leads</option>
                            
                    </select>
          </div>
          <div class="form-group">
              <label for="Project_Type">Topic:</label>
              <input type="text" class="form-control" name="Project_Type" value={{ $wonContact->Project_Type }} />
          </div>
          <div class="form-group">
              <label for="Project_Description">Remarks:</label>
              <input type="text" class="form-control" name="Project_Description" value="{{ $wonContact->Project_Description }}" />
          </div>                    
          <input type="submit" class="btn btn-primary" style="margin-bottom: 20px" value="Update">
      </form>
      </div>
  </div>
</div>
</div>
<!--------------------------------->
    </div>
</div>
@endsection

