@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Hi <b>Restaurant Admin </b>Welcome in Website Dir
                    </div>
                </div>
                <button style="background-color: midnightblue;border: 2px solid black;"><a href="/Restaurant/category" style="color: white;">Go To Dashboard </a> </button>
            </div>

        </div>

    </div>

@endsection
