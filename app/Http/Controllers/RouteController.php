<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the routes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::all(); // Retrieve all routes

        return view('routes.index', compact('routes')); // Pass routes data to view
    }

    /**
     * Show the form for creating a new route.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routes.create'); // Display create route form
    }

    /**
     * Store a newly created route in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request data (implement validation rules for each field)
        $validatedData = $request->validate([
            'start_point' => 'required|string',
            'end_point' => 'required|string',
            'distance' => 'required|string',
            'departure_time' => 'required|date_format:H:i:s',
            'arrival_time' => 'required|date_format:H:i:s|after:departure_time', // Ensure arrival after departure
        ]);

        // Create a new route using validated data
        $route = Route::create($validatedData);

        return redirect()->route('routes.index')->with('success', 'Route created successfully!'); // Redirect with success message
    }

    // ... (Optional methods for editing and deleting routes)
}