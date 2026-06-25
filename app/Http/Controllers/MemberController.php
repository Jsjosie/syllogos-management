<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members= Member::latest()->get();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:255',
        'birth_date' => 'nullable|date',
        'address' => 'nullable|string|max:255',
        'status' => 'required|in:active,inactive',
        'notes' => 'nullable|string',
    ]);

    Member::create($validated);

    return redirect()->route('members.index')
    ->with('success', 'Το μέλος δημιουργήθηκε επιτυχώς.');
}

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
{
    return view('members.edit', compact('member'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:255',
        'birth_date' => 'nullable|date',
        'address' => 'nullable|string|max:255',
        'status' => 'required|in:active,inactive',
        'notes' => 'nullable|string',
    ]);

    $member->update($validated);

    return redirect()->route('members.index')
    ->with('success', 'Το μέλος ενημερώθηκε επιτυχώς.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')
        ->with('success', 'Το μέλος διαγράφηκε επιτυχώς.');
    }
}
