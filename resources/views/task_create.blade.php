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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Post a new Thing') }}
                        </div>
                        <div class="card-body">
                          <!--
                            TODO: this should be refactored using one style
                            or the other
                          -->
                          {{ Form::open(array('url' => 'thing/new')) }}

                          <div class="row justify-content-center my-2">
                              <textarea name="message" class="form-control col-10" rows="5" cols="50"></textarea>
                              <input type="hidden" name="user_id" value="{{ $user->id }}"></input>
                          </div>
                          <div class="row justify-content-center mt-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Post the Thing') }}
                              </button>
                          </div>
                          {{ Form::close() }}
                        </div>
                    </div> <!-- card -->
                </div>  <!-- col -->
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
@endsection
