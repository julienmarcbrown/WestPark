<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'product';
    protected $primaryKey = 'prod_id';
    protected $fillable = ['prod_id', 'prod_name', 'prod_cost'];


}

