<?php

namespace App\Http\Controllers;

use App\Models\Vourcher;
use Illuminate\Http\Request;

class VourcherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vourcher::query()->latest()->get();
        return view('admin.vourchers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vourchers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vourcher::query()->create([
            'vourcher_code'=>$request->vourcher_code,
            'vourcher_value'=>$request->vourcher_value
        ]);
        return redirect()->route('admin.vourchers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vourcher = Vourcher::query()->where('id', $id)->first();
        return view('admin.vourchers.edit', compact('vourcher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vourcher = Vourcher::query()->where('id', $id)->first();
        return view('admin.vourchers.edit', compact('vourcher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'vourcher_code'=>['required'],
            'vourcher_value'=>['required']
        ]);
        Vourcher::query()->where('id',$id)->update($validate);
        return redirect()->route('admin.vourchers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vourcher::query()->where('id',$id)->delete();
        return redirect()->route('admin.vourchers.index');
    }
}
