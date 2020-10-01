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
                        <div class="alert alert-danger" style="padding:15px 0px 0px 0px">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" action="{{ route('customers.opportunities.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="Contact_First">First Name:</label>
                                <input type="text" class="form-control" name="Contact_First"
                                    value="{{ old('Contact_First') }}" />
                            </div>

                            <div class="form-group">
                                <label for="Contact_Last">Last Name:</label>
                                <input type="text" class="form-control" name="Contact_Last"
                                    value="{{ old('Contact_Last') }}" />
                            </div>

                            <div class="form-group">
                                <label for="Email">Email:</label>
                                <input type="text" class="form-control" name="Email" value="{{ old('Email') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Phone">Phone number:</label>
                                <input type="text" class="form-control" name="Phone" value="{{ old('Phone') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Date_of_Initial_Contact">Initial Contact:</label>
                                <input type="date" class="form-control" name="Date_of_Initial_Contact"
                                    value="{{ old('Date_of_Initial_Contact') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Company">Company:</label>
                                <input type="text" class="form-control" name="Company" value="{{ old('Company') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Address">Address No:</label>
                                <input type="text" class="form-control" name="Address" value="{{ old('Address') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Address_Street_1">Street:</label>
                                <input type="text" class="form-control" name="Address_Street_1"
                                    value="{{ old('Address_Street_1') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Address_City">City:</label>
                                <input type="text" class="form-control" name="Address_City"
                                    value="{{ old('Address_City') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Address_State">State:</label>
                                <input type="text" class="form-control" name="Address_State"
                                    value="{{ old('Address_State') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Address_Zip">Zip:</label>
                                <input type="text" class="form-control" name="Address_Zip"
                                    value="{{ old('Address_Zip') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Address_Country">Country:</label>
                                <input type="text" class="form-control" name="Address_Country"
                                    value="{{ old('Address_Country') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Status">Status:</label>
                                <select class="form-control" name="Status">
                                    <option value="opportunities">Opportunities</option>
                                    <option value="leads">Leads</option>
                                    <option value="won">Won</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Sales_Rep">Handler:</label>
                                <input type="text" class="form-control" name="Sales_Rep"
                                    value="{{ old('Sales_Rep') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Project_Type">Topic:</label>
                                <input type="text" class="form-control" name="Project_Type"
                                    value="{{ old('Project_Type') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Project_Description">Remarks:</label>
                                <input type="text" class="form-control" name="Project_Description"
                                    value="{{ old('Project_Description') }}" />
                            </div>
                            <div class="form-group">
                                <label for="Proposal_Due_Date">Quotation Due Date:</label>
                                <input type="date" class="form-control" name="Proposal_Due_Date"
                                    value="{{ old('Proposal_Due_Date') }}" />
                            </div>

                            <input type="submit" class="btn btn-primary" style="margin-bottom: 20px" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--------------------------------->
    </div>
</div>
@endsection
