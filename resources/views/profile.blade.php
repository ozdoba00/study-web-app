@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



@section('content')


<div class="container">

    <div class="row align-items-center">
        <section class="col-3 left">

        </section>
        <section style="max-width: 50%;" class="col main">
            <div class="card">
                <div class="card-body">
                    <h3 style="text-align: center;">Profile config</h3>
                    <form action="/post" method="post" id="post-form">
                        @csrf
                    </form>
                </div>
            </div>


</div>


@endsection
