<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard()
    {  
        $products= Product::paginate(3);
        return view ('Dashboard',compact('products'));
    }
}
