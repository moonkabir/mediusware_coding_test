@extends('admin.dashboard')
@section('title')
    Transactions Page
@endsection
@section('adminMainContent')
    @php
        $transactionsModel = new App\Models\Transactions;
    @endphp
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Current Balance: {{ Auth::user()->balance }}</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Transaction Type</th>
                                <th>Amount</th>
                                <th>fee</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            <?php $i=0; ?>
                            @foreach ($transactions as $transaction)
                                @php
                                    $transaction_Data = $transactionsModel->transanctionType($transaction->transanction_type);
                                @endphp
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{$i}}</td>
                                    <td>{{$transaction_Data}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->fee}}</td>                                    
                                    <td>{{$transaction->created_at}}</td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraScripts')
@endsection
