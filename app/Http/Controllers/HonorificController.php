<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHonorificRequest;
use App\Http\Requests\UpdateHonorificRequest;
use App\Models\Honorific;
use Illuminate\Http\Request;

class HonorificController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve the 'search' and 'trashed' filters from the request
        $filters = $request->only('search');

        //Get all the records from the database
        $honorificsPaginator = Honorific::query()
            // Apply filtering using the 'search' filter from the request
            ->filter($filters)
            // Order the results by the latest created records first
            ->latest()
            // Paginate the results (e.g. 10 per page)
            ->paginate(5)            
            // Append query parameters to the pagination links for state persistence
            ->appends(request()->query());

        //Return the array above to the Inertia view while passing in the filters
        return inertia()->render('honorifics/Index', [
            'filters' => $request->all('search'),
            'honorifics' => $honorificsPaginator,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the Inertia view for creating a new honorific
        return inertia()->render('honorifics/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHonorificRequest $request)
    {
        // Create a new honorific record in the database using the validated data
        Honorific::create($request->validated());
        // Redirect to the honorifics index page with a success message
        return to_route('honorifics.index')->with('success', 'Honorific' . ' '  . $request->name . ' ' . 'created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Honorific $honorific)
    {
        return inertia()->render('honorifics/Show', ['honorific' => $honorific,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Honorific $honorific)
    {
        // Return the Inertia view for editing the specified honorific
        return inertia()->render('honorifics/Edit', [
            'honorific' => [
                'id' => $honorific->id,
                'name' => $honorific->name,
                'description' => $honorific->description,
                'is_active' => $honorific->is_active,
                'created_by' => $honorific->created_by,
                'created_at' => $honorific->created_at,
                'updated_at' => $honorific->updated_at,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHonorificRequest $request, Honorific $honorific)
    {
        // Update the specified honorific record in the database using the validated data
        $honorific->update($request->validated());
        // Redirect to the honorifics index page with a success message
        return to_route('honorifics.index')->with('success', 'Honorific' . ' '  . $request->name . ' ' . 'updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Honorific $honorific)
    {
        // Delete the specified honorific record from the database
        $honorific->delete();
        // Redirect to the honorifics index page with a success message
        return to_route('honorifics.index')->with('success', 'Honorific' . ' '  . $honorific->name . ' ' . 'deleted.');
    }
}
