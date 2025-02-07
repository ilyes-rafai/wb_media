<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Http\Requests\StoreInstructionRequest;
use App\Http\Requests\UpdateInstructionRequest;
use App\Models\Trick;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function handleInstructionPremium(Instruction $instruction)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {

            $premium = $instruction->premium;

            $instruction->update([
                'premium' => !$premium,
            ]);

            return back()
                ->with('success', 'The instruction has been successfully updated.');
        } catch (\Exception $e) {

            return back()
                ->with($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstructionRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new instruction
            Instruction::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'code' => $validatedData['code'],
                'premium' => $validatedData['premium'],
                'trick_id' => $validatedData['trick_id'],
                'user_id' => Auth::id(), // Auth::id() is cleaner and more concise
            ]);

            // Redirect to the tricks edit with a success message
            return redirect()
                ->route('tricks.edit_instructions_page', $validatedData['trick_id'])
                ->with('success', 'The instruction has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()
                ->route('tricks.edit_instructions_page', $request->trick_id)
                ->with($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Instruction $instruction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instruction $instruction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructionRequest $request, Instruction $instruction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instruction $instruction)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            $instruction->delete();

            return redirect()
                ->back()
                ->with('success', 'The instruction has been successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while trying to delete the instruction. Please try again.');
        }
    }
}
