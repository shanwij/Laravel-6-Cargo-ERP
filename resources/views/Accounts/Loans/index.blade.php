@extends('layouts.app')

@section('content')
<div class="context-sidebar">
    <div class="nav-sidebar">
    <ul class="sidebar-top-level-items">

<li class="">
    <a href="{{ route('accounts.incomes.index') }}">
        <div class="nav-icon-container">
            <i class="fa fa-home"></i>
        </div>
        <span class="nav-item-name">Incomes</span>
    </a>
</li>

<li class="">
    <a href="{{ route('accounts.loans.index') }}">
        <div class="nav-icon-container">
            <i class="fa fa-moon-o"></i>
        </div>
        <span class="nav-item-name">Loans</span>
    </a>
</li>

<li class="">
    <a href="{{ route('accounts.payments.index') }}">
        <div class="nav-icon-container">
            <i class="fa fa-flask"></i>
        </div>
        <span class="nav-item-name">Payments</span>
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
    <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; font-size: 14px;" href="{{ route('accounts.loans.create')}}" class="btn btn-primary">Add</a>
    <a style="margin-bottom: 20px; float: right; padding: 2px 30px 2px 30px; margin-right: 4px; font-size: 14px;" href="{{ url('accounts/loans/index/pdf') }}" class="btn btn-danger">PDF</a>
</div>  
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-t-1">Date</th>
                        <th scope="col" class="col-t-1">Details</th>
                        <th scope="col" class="col-t-1">Amount</th>
                        <th scope="col" class="col-t-1">Bank</th>
                        <th scope="col" class="col-t-1">Due Date</th>
                        <th scope="col" class="col-t-1">Status</th>
                        <th scope="col" class="col-t-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $loan)
                    <tr class="tr-t-1">
                        <td class="tr-t-nm">{{ $loan->date }}</td>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{ $loan->details }}</td>
                        <td class="tr-t-nm">{{ $loan->amount }}</td>
                        <td class="tr-t-nm">{{ $loan->bank }}</td>
                        <td class="tr-t-nm">{{ $loan->due_date }}</td>
                        <td class="tr-t-nm">{{ $loan->status }}</td>
                        <th>
                        <a href="{{ route('accounts.loans.edit', $loan->id) }}" class="float-left">
                                <button>
                                    <i class="fa fa-pencil ico-tb"></i>
                                </button>
                            </a>
                            <form action="{{ route('accounts.loans.destroy', $loan->id) }}" method="POST"
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
