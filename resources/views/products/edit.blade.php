<!-- app/views/products/edit.blade.php -->

@extends('app')

@section('content')

<h1>Edit {!! $product->name !!}</h1>

<!-- if there are creation errors, they will show here -->

{!! Form::model($product, array('action' => array('ProductController@update', $product->id), 'method' => 'PUT')) !!}

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

	{!! Form::submit('Edit the product!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@endsection
