<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct() {
        //add user role permissions
    }

    // View list of all contacts
    public function index()
    {
        // Load contacts
        // return view
    }

    // View form to create new contact
    public function create()
    {
        // Return view
    }

    // Handler: Store contact into database
    public function store(Request $request)
    {
        // Validate contact data
        // Save contact
        // Redirect with success
    }

    // View contact details
    public function show(Contact $contact)
    {
        // Load contact
        // return view
    }

    // View form to edit contact
    public function edit(Contact $contact)
    {
        // Load contact
        // return view
    }

    // Handler: Update contact in database
    public function update(Request $request, Contact $contact)
    {
        // Validate data
        // Update contact
        // Redirect with success
    }

    // Handler: Delete contact from db
    public function destroy(Contact $contact)
    {
        // Delete contact
        // Redirect with success
    }
}
