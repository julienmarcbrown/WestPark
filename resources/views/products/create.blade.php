<!-- app/views/products/create.blade.php -->
@extends('app')

@section('content')

<h1>Create a product</h1>

{!! Form::open(array('url' => 'products')) !!}

	<div class="form-group">
		{!! Form::label('prod_id', 'ID') !!}
		{!! Form::text('prod_id', Input::old('prod_ID'), array('class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('prod_name', 'Name') !!}
		{!! Form::text('prod_name', Input::old('Prod_name'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('prod_cost', 'Prod Cost') !!}
		{!! Form::text('prod_cost', Input::old('prod_cost'), array('class' => 'form-control')) !!}
	</div>

	{!! Form::submit('Create the product!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@endsection
