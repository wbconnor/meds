@extends('layouts.layout')

@section('nav')
<navbar
    :user="{{ json_encode($user) }}"
    csrf_token="{{ csrf_token() }}"
></navbar>
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
      @auth
        <task-cards
            :user="{{ json_encode($user) }}"
            csrf_token="{{ csrf_token() }}"
        ></task-cards>
      @endauth
      @guest
        <div class="d-flex justify-content-center" style="padding-top:6em;">
          <div class="col-md-6">
              <div class="card mb-4 shadow-sm">
                  <div class="card-body">

                    <div class="d-flex justify-content-center">

                      <div class="col-8 align-items-center">
                        <h3 class="card-title my-auto">Please login to use this app</h3>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
        </div>
      @endguest
    </div>
</div>
@endsection
