@extends('app')

@section('content')

	<div class="container">





		<div class="product_listing" >

			<li><a href="{{ url('products/create') }}">Add a Product</a></li>

			<h1>Product Listing</h1>

			<!-- will be used to show any messages -->
			@if (Session::has('message'))
				<div class="alert alert-info">{!! Session::get('message') !!}</div>
			@endif

			<table class="table table-striped table-bordered">
				<thead>
				<tr>
					<td>prod_id</td>
					<td>prod_Name</td>
					<td>prod_cost</td>
					<td>actions</td>
				</tr>
				</thead>
				<tbody>
				@foreach($products as $key => $value)
					<tr>
						<td>{!! $value->prod_id !!}</td>
						<td>{!! $value->prod_name !!}</td>
						<td>{!! $value->prod_cost !!}</td>


						<!-- we will also add show, edit, and delete buttons -->
						<td>

							<!-- delete the product (uses the destroy method DESTROY /products/{id} -->
							<!-- we will add this later since its a little more complicated than the first two buttons -->
							{!! Form::open(array('url' => 'products/' . $value->id, 'class' => 'pull-right')) !!}
							{!! Form::hidden('_method', 'DELETE') !!}
							{!! Form::submit('Delete this product', array('class' => 'btn btn-warning')) !!}
							{!! Form::close() !!}

							<!-- show the product (uses the show method found at GET /products/{id} -->
							<a class="btn btn-small btn-success" href="{!! URL::to('products/' . $value->prod_id) !!}">Show this product</a>

							<!-- edit this product (uses the edit method found at GET /products/{id}/edit -->
							<a class="btn btn-small btn-info" href="{!! URL::to('products/' . $value->prod_id . '/edit') !!}">Edit this product</a>

						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			@endsection
		</div>
	</div>