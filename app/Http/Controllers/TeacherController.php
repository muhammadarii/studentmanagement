<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Teacher;
use Illuminate\View\View;

class TeacherController extends Controller
{

    public function index(): View
    {
        $teachers = Teacher::all();
        return view ('teachers.index')->with('teachers', $teachers);
    }

 
    public function create(): View
    {
        return view('teachers.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        teacher::create($input);
        return redirect('teachers')->with('flash_message', 'Teacher Addedd!');
    }

    public function show(string $id): View
    {
        $teacher = teacher::find($id);
        return view('teachers.show')->with('teachers', $teacher);
    }

    public function edit(string $id): View
    {
        $teacher = teacher::find($id);
        return view('teachers.edit')->with('teachers', $teacher);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $teacher = teacher::find($id);
        $input = $request->all();
        $teacher->update($input);
        return redirect('teachers')->with('flash_message', 'Teachers Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teachers deleted!'); 
    }
}