@extends('layouts.app')

@section('content')
<div class="context-sidebar">
    <div class="nav-sidebar">
        <ul class="sidebar-top-level-items">

            <li class="">
                <a href="">
                    <div class="nav-icon-container">
                        <i class="fa fa-home"></i>
                    </div>
                    <span class="nav-item-name">Employees</span>
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
                            <div class="breadcrumbs-sub-title"><a href="/">Breadcrumbs Three</a></div>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

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
                        <form method="post"
                            action="{{ route('employees.staff.update', ['employee' => $employee->id]) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="firstName">First Name:</label>
                                <input type="text" class="form-control" name="firstName" value={{ $employee->firstName }} />
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" name="lastName" value={{ $employee->lastName }} />
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="text" class="form-control" name="dob" value={{ $employee->dob }} />
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value={{ $employee->gender }}>Female</option>
                                    <option value="Male">Male</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" value={{ $employee->email }} />
                            </div>

                            <div class="form-group">
                                <label for="phoneNo">Phone No:</label>
                                <input type="text" class="form-control" name="phoneNo" value={{ $employee->phoneNo }} />
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" name="address" rows="4">{{ $employee->address }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="position">Position: </label>
                                <input type="text" class="form-control" name="position" value={{ $employee->position }} />
                            </div>

                            <div class="form-group">
                                <label for="workStart">Joined: </label>
                                <input type="date" class="form-control" name="workStart" value={{ $employee->workStart }} />
                            </div>

                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
