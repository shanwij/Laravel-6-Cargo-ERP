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

        <div class="con-tab">
            <div>
            <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; margin-right: 4px; font-size: 14px;" href="{{ url('customers/leads/index/pdf') }}" class="btn btn-danger">PDF</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-t-1">Company</th>
                        <th scope="col" class="col-t-1">Topic</th>
                        <th scope="col" class="col-t-1">Contact Person</th>
                        <th scope="col" class="col-t-1">Handler</th>
                        <th scope="col" class="col-t-1">Phone Number</th>
                        <th scope="col" class="col-t-1">Email</th>
                        <th scope="col" class="col-t-1">Initial Date</th>
                        <th scope="col" class="col-t-1">Status</th>
                        <th scope="col" class="col-t-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leadsContact as $leadsContact)
                    <tr class="tr-t-1">
                        <td class="tr-t-nm">{{ $leadsContact->Company }}</td>
                        <td class="tr-t-nm">{{ $leadsContact->Project_Type }}</td>
                        <td class="tr-t-nm">{{ $leadsContact->Contact_First }} {{ $leadsContact->Contact_Last }}</td>
                        <td class="tr-t-nm">{{ $leadsContact->Sales_Rep }}</td>
                        <td class="tr-t-nm">{{ $leadsContact->Phone }}</td>
                        <td class="tr-t-nm">{{ $leadsContact->Email }}</td>
                        <td class="tr-t-nm">{{ $leadsContact->Date_of_Initial_Contact }}</td>
                        <td class="tr-t-nm">{{ $leadsContact->Status }}</td>
                        <th>
                            <a href="{{ route('customers.leads.edit',$leadsContact->id) }}" class="float-left">
                                <button>
                                    <i class="fa fa-pencil ico-tb"></i>
                                </button>
                            </a>
                            <form action="{{ route('customers.leads.destroy', $leadsContact->id) }}" method="POST"
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