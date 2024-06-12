<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(StoreSubscriberRequest $request)
    {
        $validatedData = $request->validated();

        Subscriber::create($validatedData);

        return redirect()->route('theme.index')->with('success', 'Welcome, you are now a subscriber!');
    }
}
