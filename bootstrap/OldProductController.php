<?php namespace App\Http\Controllers;


use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller {


    public function getProducts()
    {
        $products =  Product::all();
        if (Auth::check())
        {
            return view('products')-> with(array('products' => $products));
        }
        else
        {
            return 'not logged in!';
        }
        }

    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('create');
    }
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'prod_name'       => 'required',
            'prod_id'      => 'required',
            'prod_cost' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $product = new Product;
            $product->prod_id       = Input::get('prod_id');
            $product->prod_name      = Input::get('prod_name');
            $product->prod_cost = Input::get('prod_cost');
            $product->save();

            // redirect
            return Redirect::to('products');
        }
    }




}
