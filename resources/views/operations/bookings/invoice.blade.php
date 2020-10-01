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
                    <form method="post" action="{{ route('operations.bookings.updatevoice', ['loading' => $loading->id]) }}">
                    
                    @csrf
                        <div class="form-group">
                            <label for="invoiceNo">Invoice No:</label>
                            <input type="text" class="form-control" name="invoiceNo" value="{{ $loading ->invoiceNo }}"/>
                        </div>

                        <div class="form-group">
                            <label for="conName">Invoice Date:</label>
                            <input type="date" class="form-control" name="invoiceDate" value="{{ $loading ->invoiceDate }}" />
                        </div>
                        
                        <div class="form-group">
                            <label for="conName">Consignee Name:</label>
                            <input type="text" class="form-control" name="conName" value="{{ $loading ->conName }}" />
                        </div>

                        <div class="form-group">
                            <label for="conAddress">Consignee Address:</label>
                            <input type="text" class="form-control" name="conAddress"  value="{{ $loading ->conAddress }}" />
                        </div>

                        <div class="form-group">
                            <label for="conPhone">Consignee Contact:</label>
                            <input type="text" class="form-control" name="conPhone" value="{{ $loading ->conPhone }}" />
                        </div>

                        <div class="form-group">
                            <label for="oceanVess">Ocean Vessel:</label>
                            <input type="text" class="form-control" name="oceanVess" value="{{ $loading ->oceanVess }}" />
                        </div>

                        <div class="form-group">
                            <label for="oceanDate">Ocean Date:</label>
                            <input type="date" class="form-control" name="oceanDate" value="{{ $loading ->oceanDate }}" />
                        </div>

                        <div class="form-group">
                            <label for="shipPort">Port of Shipment:</label>
                            <input type="text" class="form-control" name="shipPort" value="{{ $loading ->shipPort }}" />
                        </div>

                        <div class="form-group">
                            <label for="delPort">Port of Delivery:</label>
                            <input type="text" class="form-control" name="delPort" value="{{ $loading ->delPort }}" />
                        </div>

                        <div class="form-group">
                            <label for="containerNo">Container No:</label>
                            <input type="text" class="form-control" name="containerNo" value="{{ $loading ->containerNo }}" />
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
