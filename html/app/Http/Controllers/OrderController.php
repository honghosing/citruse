<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct() {
        //add user role permissions
    }

    // View orders
    public function index()
    {
        // Load orders
        // return view
    }

    // View form to create order
    public function create()
    {
        // Load businesses, stock
        // return view
    }

    // Handler: Store order to db
    public function store(Request $request)
    {
        // Validate
        // Create order and line items
        // Redirect with success
    }

    // View order detail
    public function show(Order $order)
    {
        // Load order and details
        // return view
    }

    // View form to edit order
    public function edit(Order $order)
    {
        // Load order and dependencies
        // return view
    }

    // Handler: Update order
    public function update(Request $request, Order $order)
    {
        // Validate
        // Update order
        // Redirect with success
    }

    // Handler: Delete order
    public function destroy(Order $order)
    {
        // Delete order
        // Redirect with success
    }
}
