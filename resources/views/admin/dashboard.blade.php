


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('TransactionManage') }}">All Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('TransactionDeposit') }}">Deposit Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('TransactionDepositAdd') }}">Add Deposit Transactions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('TransactionWithdraw') }}">Withdraw Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('TransactionWithdrawAdd') }}">Add Withdraw Transactions</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('TransactionWithdrawAdd') }}">Add Withdraw Transactions</a> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout ({{Auth::user()->name}})
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield("adminMainContent")
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @yield('extraScripts')
</body>
</html>