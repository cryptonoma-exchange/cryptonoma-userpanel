@extends('layouts.apps')

@section('contents')
<section class="grey-bgs">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12 loginformbanner">


					<div class="text-center form-logo mt-3 mb-3">
						<a href="{{url('/')}}">
							<img class="color-logo" src="{{ url('images/cryptocash-logo.svg') }}">
						</a>
					</div>
					<div class="panel panel-default form-panel site-form">						
						<h3 class="bf b-t text-success text-center">@lang('common.Success')!</h3>
						<p class="text-center text-success"><i class="fa fa-check-circle tick-green" aria-hidden="true"></i></p>						
						<p class="s-content text-center">@lang('common.Successtxt') </p>						
						@php
							$successemail = \Session::get('successemail');
						@endphp
						<div class="mt-20 btnsnfg text-center"><a class="btn yellow-btn btn-block btn-lg" href="{{ url('reconfirm_account/'.$successemail)  }}">@lang('common.successemail')</a></div>
						<br/>
						<div align="center">
							<a href="{{ url('/login') }}" class="btn site-btn text-uppercase m-btn">@lang('common.Next')</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection    