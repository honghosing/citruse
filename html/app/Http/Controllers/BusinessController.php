<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function __construct() {
        //add user role permissions
    }

    // View a list of businesses by type
    public function index(Request $request)
    {
        // Load business - filter by business_type
        // Load contacts into view

        // Return view
    }

    // View a form to create business
    public function create()
    {
        // Load contacts into view for dropdown
        // return view
    }

    // Handle: Store business into database
    public function store(Request $request)
    {
        // Validate request data
        // Create new business record using validated data
        // Redirect to index with success message
    }

    // View details for business by businessId
    public function show(Business $business)
    {
        // Load business - filter by business_type
        // Load contacts into view

        // Return view
    }

    // View form to edit an existing business
    public function edit(Business $business)
    {
        // Load business - filter by business_type
        // Load contacts into view

        // Return view
    }

    // Handler: Update existing business
    public function update(Request $request, Business $business)
    {
        // Validate form data
        // Update business
        // Redirect with success message
    }

    // Handler: Delete a business
    public function destroy(Business $business)
    {
        // Delete business from database
        // Redirect with success message
    }
}
