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

        <div class="con-tab">

        <div>
    <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; font-size: 14px;" href="{{ route('operations.bookings.create')}}" class="btn btn-primary">Add</a>
    <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; margin-right: 4px; font-size: 14px;" href="{{ url('operations/bookings/index/pdf') }}" class="btn btn-danger">PDF</a>
    </div>  
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-t-1">Booking ID</th>
                        <th scope="col" class="col-t-1">Shipper</th>
                        <th scope="col" class="col-t-1">Contact No.</th>
                        <th scope="col" class="col-t-1">Loading Date</th>
                        <th scope="col" class="col-t-1">Pickup Date</th>
                        <th scope="col" class="col-t-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loadings as $loading)
                    <tr class="tr-t-1">
                        <td class="tr-t-nm">{{ $loading->id }}</td>
                        <td class="tr-t-nm">{{ $loading->shipper }}</td>
                        <td class="tr-t-nm">{{ $loading->contactNo }}</td>
                        <td class="tr-t-nm">{{ $loading->loadingDate }}</td>
                        <td class="tr-t-nm">{{ $loading->pickupDate }}</td>
                        <th>
                            <a href="{{ route('operations.bookings.edit', $loading->id) }}" class="float-left">
                                <button>
                                    <i class="fa fa-pencil ico-tb"></i>
                                </button>
                            </a>
                            <form action="{{ route('operations.bookings.destroy', $loading->id) }}" method="POST"
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
