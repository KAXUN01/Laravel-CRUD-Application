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
                'info' => 'nullable|string|max:1000',
            ]);

            $student = Student::create($validated);
            
            if($student) {
                return redirect()->route('welcome')->with('success', 'Student added successfully!');
            } else {
                return back()->with('error', 'Failed to add student.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
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
                'info' => 'nullable|string|max:1000',
            ]);

            $student->update($validated);
            return redirect()->route('welcome')->with('success', 'Student updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
    
}