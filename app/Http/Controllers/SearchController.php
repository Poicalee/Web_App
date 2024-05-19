<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function searchRoutes(Request $request)
    {
        $searchQuery = $request->input('searchQuery');
    
        $routes = Route::where('start_point', 'like', "%$searchQuery%")
                      ->orWhere('end_point', 'like', "%$searchQuery%")
                      ->get();
    
        return view('search', ['routes' => $routes]);
    }
    
}
