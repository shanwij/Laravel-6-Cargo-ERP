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
                            <div class="breadcrumbs-sub-title"><a href="/">Bradcrumbs Three</a></div>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="con-tab">

        <div>
        <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; margin-right: 4px; font-size: 14px;" href="{{ url('employees/staff/index/pdf') }}" class="btn btn-danger">PDF</a>
        <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; font-size: 14px;" href="{{ route('employees.staff.create')}}" class="btn btn-primary">Add</a>
    </div>  
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-t-1">ID</th>
                        <th scope="col" class="col-t-1">Name</th>
                        <th scope="col" class="col-t-1">Date of Birth</th>
                        <th scope="col" class="col-t-1">Gender</th>
                        <th scope="col" class="col-t-1">Email</th>
                        <th scope="col" class="col-t-1">Phone No.</th>
                        <th scope="col" class="col-t-1">Address</th>
                        <th scope="col" class="col-t-1">Position</th>
                        <th scope="col" class="col-t-1">Joined</th>
                        <th scope="col" class="col-t-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee as $employee)
                    <tr class="tr-t-1">
                        <td class="tr-t-nm">{{ $employee->id }}</td>
                        <td class="tr-t-nm">{{ $employee->firstName }} {{ $employee->lastName }} </td>
                        <td class="tr-t-nm">{{ $employee->dob }}</td>
                        <td class="tr-t-nm">{{ $employee->gender }}</td>
                        <td class="tr-t-nm">{{ $employee->email }}</td>
                        <td class="tr-t-nm">{{ $employee->phoneNo }}</td>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{ $employee->address }}</td>
                        <td class="tr-t-nm">{{ $employee->position }}</td>
                        <td class="tr-t-nm">{{ $employee->workStart }}</td>               
                        <th>
                        <a href="{{ route('employees.staff.edit', $employee->id) }}" class="float-left">
                                <button>
                                    <i class="fa fa-pencil ico-tb"></i>
                                </button>
                            </a>
                            <form action="{{ route('employees.staff.destroy', $employee->id) }}" method="POST"
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
