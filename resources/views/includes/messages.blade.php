@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
  @endforeach
@endif
@if (session()->has('message'))
	<h4 class="alert alert-success">{{ session('message') }}</h4>
@endif

