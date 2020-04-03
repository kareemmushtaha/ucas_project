@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        Hi Admin boss!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center;margin-top: 30px;">
        <button style=" background-color: #3e5eff;border: none;font-family: Andalus;"><a href="/userAdmin" style="color: white;"> Go to the dashboard</a> </button>
    </div>
@endsection
