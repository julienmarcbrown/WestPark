<!-- app/views/products/show.blade.php -->
@extends('app')

@section('content')

<h1>Showing {{ $product->name }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $product->name }}</h2>
		<p>
			<strong>Product:</strong> {{ $product->prod_id }}<br>
			<strong>Product Name:</strong> {{ $product->prod_name }}
		</p>
	</div>
@endsection
