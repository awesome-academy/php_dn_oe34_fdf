<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('custom.paginate.limits'));

        return view('users.index', compact( 'products'));
    }
}
