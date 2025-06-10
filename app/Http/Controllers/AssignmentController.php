<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('assignments.index', ['assignments' => Assignment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        Assignment::create($validated);

        return redirect()->route('assignments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        return view('assignments.show', ['assignment' => $assignment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', ['assignment' => $assignment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        $assignment->update($validated);

        return redirect()->route('assignments.show', ['assignment' => $assignment]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route('assignments.index', ['assignments' => Assignment::all()]);
    }
}
