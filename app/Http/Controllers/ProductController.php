<?php namespace App\Http\Controllers;


use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Session;



class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the products
		$products = Product::all();

		// load the view and pass the products
		return View::make('products.index')
			->with('products', $products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/products/create.blade.php)
		return View::make('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'prod_id'       => 'required',
			'prod_name'      => 'required',
			'prod_cost' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('products/create')
				->withErrors($validator);
		} else {
			// store
			$product = new product;
			$product->prod_id       = Input::get('prod_id');
			$product->prod_name      = Input::get('prod_name');
			$product->prod_cost = Input::get('prod_cost');
			$product->save();

			// redirect
			Session::flash('message', 'Successfully created product!');
			return Redirect::to('products');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the product
		$product = Product::find($id);

		// show the view and pass the product to it
		return View::make('products.show')
			->with('product', $product);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the product
		$product = product::find($id);

		// show the edit form and pass the product
		return View::make('products.edit')
			->with('product', $product);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'product_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('products/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$product = product::find($id);
			$product->name       = Input::get('name');
			$product->email      = Input::get('email');
			$product->product_level = Input::get('product_level');
			$product->save();

			// redirect
			Session::flash('message', 'Successfully updated product!');
			return Redirect::to('products');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$product = product::find($id);
		$product->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the product!');
		return Redirect::to('products');
	}

}