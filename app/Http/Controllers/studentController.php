<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('addStudent');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:students,email',
                'phone' => 'nullable|string|max:20',
                'date_of_birth' => 'nullable|date',
                'gender' => 'required|in:male,female,other',
                'address' => 'nullable|string|max:500',
                'info' => 'nullable|string|max:1000',
            ]);

            $student = Student::create($validated);
            
            return redirect()->route('welcome')->with('success', 'Student registered successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    public function index()
    {
        $students = Student::all();  
        return view('welcome', compact('students'));
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->route('welcome')->with('success', 'Student deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Student $student)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:students,email,'.$student->id,
                'phone' => 'nullable|string|max:20',
                'date_of_birth' => 'nullable|date',
                'gender' => 'required|in:male,female,other',
                'address' => 'nullable|string|max:500',
                'info' => 'nullable|string|max:1000',
            ]);

            $student->update($validated);
            return redirect()->route('welcome')->with('success', 'Student updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
    
}