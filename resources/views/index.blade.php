@extends('templates.outs.home')

@section('content')
    {{-- HEADER--}}
	<div class="hug hug-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('home') }}" class="pull-left"><img src="{{ \App\Helpers\Helpers::logoUrl() }}" alt="Ribbbon"></a>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-line pull-right login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-line pull-right register">Register</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
	</div>
    

    {{-- UI --}}
    
    


    {{-- footer --}}
    <div class="hug hug-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3>Current Version <span class="color-primary">0.1</span> | <a class="color-primary" href="https://github.com/KevinHoxhalli/Group4" target="_blank">Go To Project</a></h3>
                    <hr class="special">
                    <p class="text-center last-line">Copyright {{ date("Y") }} &copy;  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">PSI</a></p>
                </div>
            </div>
        </div>
    </div>
@stop