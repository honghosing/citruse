<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function __construct() {
        //add user role permissions
    }

    // View order details list
    public function index()
    {
        // Load all order details
        // return view
    }

    // View form to create order line item
    public function create()
    {
        // Load stock and orders
        // return view
    }

    // Handler: Store order detail
    public function store(Request $request)
    {
        // Validate
        // Save line item
        // Redirect with success
    }

    // View order detail
    public function show(OrderDetail $orderDetail)
    {
        // Load detail
        // return view
    }

    // View form to edit line item
    public function edit(OrderDetail $orderDetail)
    {
        // Load line
        // return view
    }

    // Handler: Update line item
    public function update(Request $request, OrderDetail $orderDetail)
    {
        // Validate
        // Update line
        // Redirect with success
    }

    // Handler: Delete order detail
    public function destroy(OrderDetail $orderDetail)
    {
        // Delete line
        // Redirect with success
    }
}
