<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct() {
        //add user role permissions
    }

    // View list of stock items
    public function index()
    {
        // Load stock
        // return view
    }

    // View form to create stock
    public function create()
    {
        // return view
    }

    // Handler: Save new stock to database
    public function store(Request $request)
    {
        // Validate data
        // Save stock
        // Redirect with success
    }

    // View stock details
    public function show(Stock $stock)
    {
        // Load stock
        // return view
    }

    // View form to edit stock
    public function edit(Stock $stock)
    {
        // Load stock
        // return view
    }

    // Handler: Update stock item
    public function update(Request $request, Stock $stock)
    {
        // Validate
        // Update stock
        // Redirect with success
    }

    // Handler: Delete stock item
    public function destroy(Stock $stock)
    {
        // Delete stock
        // Redirect with success
    }
}
