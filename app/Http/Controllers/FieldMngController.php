<?php

namespace App\Http\Controllers;

use App\Models\FieldMng;
use Illuminate\Http\Request;

class FieldMngController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.name' => 'required',
            'inputs.*.email' => 'required',
            'inputs.*.mark' => 'required',
        ],
            [
                'inputs.*.name' => 'The name field is required!',
            ]);
        foreach ($request->inputs as $key => $value) {
            FieldMng::create($value);
        }

        return back()->with('success', 'The post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FieldMng $fieldMng)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FieldMng $fieldMng)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FieldMng $fieldMng)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FieldMng $fieldMng)
    {
        //
    }
}
