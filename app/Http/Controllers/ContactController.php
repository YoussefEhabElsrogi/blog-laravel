<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $validatedData = $request->validated();

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Your issue has been successfully recorded. We will review and resolve it as soon as possible, and we will contact you to ensure the issue has been resolved.');
    }
}
