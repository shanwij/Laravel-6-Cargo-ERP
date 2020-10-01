@extends('layouts.app')

@section('content')
<div class="context-sidebar">
<div class="nav-sidebar">
        <ul class="sidebar-top-level-items">

            <li class="">
                <a href="{{ route('operations.bookings.index') }}">
                    <div class="nav-icon-container">
                        <i class="fa fa-home"></i>
                    </div>
                    <span class="nav-item-name">Bookings</span>
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
                    <form method="post" action="{{ route('operations.bookings.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="shipper">Shipper: </label>
                            <input type="text" class="form-control" name="shipper" />
                        </div>

                        <div class="form-group">
                            <label for="contactNo">Contact No: </label>
                            <input type="text" class="form-control" name="contactNo" />
                        </div>

                        <div class="form-group">
                            <label for="loadingDate">Loading Date: </label>
                            <input type="date" class="form-control" name="loadingDate" />
                        </div>

                        <div class="form-group">
                            <label for="pickupDate">Pickup Date: </label>
                            <input type="date" class="form-control" name="pickupDate" />
                        </div>

                        <div class="form-group">
                            <label for="loadingAdd">Loading Address: </label>
                            <input type="text" class="form-control" name="loadingAdd" />
                        </div>

                        <div class="form-group">
                            <label for="loadingNum">Loading Number: </label>
                            <input type="text" class="form-control" name="loadingNum" />
                        </div>

                        <div class="form-group">
                            <label for="dCompanyName">D Company Name: </label>
                            <input type="text" class="form-control" name="dCompanyName" />
                        </div>

                        <div class="form-group">
                            <label for="dAddress">D Address: </label>
                            <input type="text" class="form-control" name="dAddress" />
                        </div>

                        <div class="form-group">
                            <label for="dPerson">D Person: </label>
                            <input type="text" class="form-control" name="dPerson" />
                        </div>

                        <div class="form-group">
                            <label for="dNumber">D Number: </label>
                            <input type="text" class="form-control" name="dNumber" />
                        </div>

                        <input type="submit" class="btn btn-primary" style="margin-bottom: 20px" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>
@endsection
