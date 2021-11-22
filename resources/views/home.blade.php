@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row align-items-center">
        <section class="col-3 left">

        </section>
        <section class="col main">
            <div class="card">
                <div class="card-body">
                    <form action="/" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <p>IMG</p>
                            </div>
                            <input type="text" class="form-control"
                                placeholder="What are you thinking about, {{$user->name}}?">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="..." alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <span class="user-data"><a href=""> {{$user->name}} {{$user->last_name}}</a></span>
                        </div>
                      </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body"></div>
            </div>

            <div class="card">
                <div class="card-body"></div>
            </div>
        </section>
        <section class="col-3 chat">

        </section>
    </div>
</div>
@endsection
