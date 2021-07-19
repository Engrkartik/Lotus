@extends('include.layout')
@section('content')
<form action="loginsubmit" class="myform" method="POST">
    @csrf
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
  <div class="form-group">
    <label for="tel">Mobile Number</label>
    <input type="Number" class="form-control" placeholder="Enter Mobile Number" name="ph_number">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="pwd">
  </div>
  <!-- <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div> -->
  <br>
  <div class="form-group">
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-secondary">Clear</button>
  </div>
  <div class="form-group">
    <div class="row">
      <a href="create">Create An Account?</a>
    </div>
  </div>
      
</form>
@endsection