@extends('admin.dashboard')
@section('title')
    Withdraw Create
@endsection
@section('adminMainContent')
    <style>
        select.form-control,
        select.typeahead,
        select.tt-query,
        select.tt-hint {
            color: #000;
            padding: 0.875rem 1.375rem !important;
        }
    </style>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" id="setting_form" action="{{ route('TransactionWithdrawstore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 col-form-label">Amount<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
                                    @error('amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Add Withdraw</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraScripts')
@endsection
