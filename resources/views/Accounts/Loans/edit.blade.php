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
                    <form method="post" action="{{ route('accounts.loans.update', ['loan' => $loan->id]) }}">
                    @method('PATCH') 
                    @csrf
                
                        <div class="form-group">
                            <label for="amount">Date:</label>
                            <input type="text" class="form-control" name="date" value={{ $loan->date }} />
                        </div>

                        <div class="form-group">
                            <label for="desc">Details:</label>
                            <textarea class="form-control" name="details" rows="5" >{{ $loan->details }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="bank">Amount:</label>
                            <input type="text" class="form-control" name="amount" value={{ $loan->amount }} />
                        </div>

                        <div class="form-group">
                            <label for="date">Bank:</label>
                            <input type="text" class="form-control" name="bank" value={{ $loan->bank }} />
                        </div>

                        <div class="form-group">
                            <label for="date">Due Date:</label>
                            <input type="text" class="form-control" name="due_date" value={{ $loan->due_date }} />
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" name="status" value={{ $loan->status }} />
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
