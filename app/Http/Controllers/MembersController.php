<?php namespace App\Http\Controllers;
use App\User;

class MembersController extends Controller {

    public function index()
    {
        return view('members.portal');
    }



}
