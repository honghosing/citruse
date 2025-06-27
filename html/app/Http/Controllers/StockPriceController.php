<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockPriceController extends Controller
{
    public function __construct() {
        //add user role permissions
    }

    // View yearly price list
    public function index()
    {
        // Load stock prices
        // return view
    }

    // View form to add stock price for year
    public function create()
    {
        // Load stock for dropdown
        // return view
    }

    // Handler: Store stock price
    public function store(Request $request)
    {
        // Validate
        // Save price entry
        // Redirect with success
    }

    // View specific stock price entry
    public function show(StockPrice $stockPrice)
    {
        // Load price
        // return view
    }

    // View form to edit stock price
    public function edit(StockPrice $stockPrice)
    {
        // Load price
        // return view
    }

    // Handler: Update stock price
    public function update(Request $request, StockPrice $stockPrice)
    {
        // Validate
        // Update price
        // Redirect with success
    }

    // Handler: Delete stock price entry
    public function destroy(StockPrice $stockPrice)
    {
        // Delete price
        // Redirect with success
    }
}
