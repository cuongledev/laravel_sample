<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the home .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id','DESC')->limit(12)->get();
        return view('frontend.default.index',$data);
    }

    public function show($slug, $id){
        $data['product'] = Product::find($id);
        return view('frontend.default.single-product',$data);

    }
}
