@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-6 col-md-offset-3">
    		@if(Session::has('flash_message'))
    			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    		@endif
    		<h2>Contact Us</h2>
    		<form method="POST" action="{{Route('contact.store')}}">
    			{{csrf_field()}}

    			<div class="form-group">
    			  <label class="col-form-label" >Ful Name: </label>
    			  <input type="text" class="form-control"  name="name" required>
    			  @if($errors->has('name'))
    			  <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
    			  @endif
    			</div>

    			<div class="form-group">
    			  <label class="col-form-label" >Email: </label>
    			  <input type="text" class="form-control"  name="email" required>
    			  @if($errors->has('email'))
    			  <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
    			  @endif
    			</div>

    			<div class="form-group">
    			  <label class="col-form-label" >Message: </label>
    			  <textarea  name="message" class="form-control" required>  </textarea>
    			  @if($errors->has('message'))
    			  <small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
    			  @endif
    			</div>

    			<button class="btn btn-primary" type="submit">Submit</button>
    		</form>
    	</div>
	</div>
</div>
@endsection