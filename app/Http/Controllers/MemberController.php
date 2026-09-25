<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Department;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $search = $request->input('search');
    $status = $request->input('status');
    $departmentId = $request->input('department_id');

    $departments = Department::orderBy('name')->get();

    $members = Member::with('departments')
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->when($status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->when($departmentId, function ($query, $departmentId) {
            $query->whereHas('departments', function ($query) use ($departmentId) {
                $query->where('departments.id', $departmentId);
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('members.index', compact('members', 'search', 'status', 'departments', 'departmentId'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
        $departments = Department::orderBy('name')->get();

        return view('members.create', compact('departments'));
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
        'department_ids' => 'nullable|array',
        'department_ids.*' => 'exists:departments,id',
    ]);

    $departmentIds = $validated['department_ids'] ?? [];
    unset($validated['department_ids']);

    $member = Member::create($validated);

    $member->departments()->sync($departmentIds);

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
        $departments = Department::orderBy('name')->get();

        return view('members.edit', compact('member', 'departments'));
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
        'department_ids' => 'nullable|array',
        'department_ids.*' => 'exists:departments,id',
    ]);

    $departmentIds = $validated['department_ids'] ?? [];
    unset($validated['department_ids']);

    $member->update($validated);

    $member->departments()->sync($departmentIds);

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
