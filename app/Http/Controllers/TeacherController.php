<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['teachers'] = Teacher::paginate(20);
        return view('teachers.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $dataTeacher=request()->all();
        $dataTeacher = request()->except('_token');
        if ($request->hasFile('image')) {
            $dataTeacher['image'] = $request->file('image')->store('uploads', 'public');
        }
        Teacher::insert($dataTeacher);
        //return response()->json($dataTeacher);
        return redirect('teachers')->with('mensaje', 'Profesor agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataTeacher = request()->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            $teachers = Teacher::findOrFail($id);
            Storage::delete('public/' . $teachers->image);
            $dataTeacher['image'] = $request->file('image')->store('uploads', 'public');
        }
        Teacher::where('id', '=', $id)->update($dataTeacher);
        $teachers = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teachers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teachers = Teacher::findOrFail($id);
        if (Storage::delete('public/' . $teachers->image)) {
            Teacher::destroy($id);
        }
        return redirect('teachers')->with('mensaje', 'Profesor eliminado');
    }
}
