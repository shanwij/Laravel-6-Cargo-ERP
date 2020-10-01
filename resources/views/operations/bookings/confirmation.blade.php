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
        <span class="nav-item-name">Booking ID: {{ $loading ->id }} </span>
    </a>
</li>

<li class="">
    <a href="{{ route('operations.bookings.edit', $loading->id) }}">
        <div class="nav-icon-container">
        
        </div>
        <span class="nav-item-name">Loading Summary</span>
    </a>
</li>

<li class="">
    <a href="{{ route('operations.bookings.editvoice', $loading->id) }}">
        <div class="nav-icon-container">
        
        </div>
        <span class="nav-item-name">Invoice</span>
    </a>
</li>

<li class="">
    <a href="{{ route('operations.bookings.editconfirm', $loading->id) }}">
        <div class="nav-icon-container">

        </div>
        <span class="nav-item-name">Loading Confirmation</span>
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
                    <form method="post" action="{{ route('operations.bookings.updateconfirm', ['loading' => $loading->id]) }}">
                    @csrf
                        <div class="form-group">
                            <label for="containerNo">Container Number:</label>
                            <input type="text" class="form-control" name="containerNo" value="{{ $loading ->containerNo }}" readonly />
                        </div>
                        
                        <div class="form-group">
                            <label for="oceanVess">Ocean Vessel:</label>
                            <input type="text" class="form-control" name="oceanVess" value="{{ $loading ->oceanVess }}" readonly />
                        </div>

                        <div class="form-group">
                            <label for="shipper">Shipper:</label>
                            <input type="text" class="form-control" name="shipper" value="{{ $loading ->shipper }}" readonly />
                        </div>

                        <div class="form-group">
                            <label for="shipper_add">Shipper Address:</label>
                            <input type="text" class="form-control" name="shipper_add" value="{{ $loading ->shipper_add }}" />
                        </div>

                        <div class="form-group">
                            <label for="conName">Consignee Name:</label>
                            <input type="text" class="form-control" name="conName" value="{{ $loading ->conName }}"  readonly />
                        </div>

                        <div class="form-group">
                            <label for="conAddress">Consignee Address:</label>
                            <input type="text" class="form-control" name="conAddress" value="{{ $loading ->conAddress }}" readonly />
                        </div>

                        <div class="form-group">
                            <label for="qty">Quantity:</label>
                            <input type="text" class="form-control" name="qty" value="{{ $loading ->qty }}" />
                        </div>

                        <div class="form-group">
                            <label for="desc">Description:</label>
                            <input type="text" class="form-control" name="desc" value="{{ $loading ->desc }}" />
                        </div>

                        <div class="form-group">
                            <label for="weight">Weight:</label>
                            <input type="text" class="form-control" name="weight" value="{{ $loading ->weight }}"/>
                        </div>

                        <div class="form-group">
                            <label for="cbm">CBM:</label>
                            <input type="text" class="form-control" name="cbm" value="{{ $loading ->cbm }}"/>
                        </div>

                        <div class="form-group">
                            <label for="oceanDate">Sailed Date:</label>
                            <input type="date" class="form-control" name="oceanDate" value="{{ $loading ->oceanDate }}" readonly />
                        </div>

                        <div class="form-group">
                            <label for="contactNo">Contact Number:</label>
                            <input type="text" class="form-control" name="contactNo" value="{{ $loading ->contactNo }}" readonly />
                        </div>


                        <input type="submit" class="btn btn-primary" style="margin-bottom: 20px; float: right;" value="Update">
                    </form>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>
@endsection
