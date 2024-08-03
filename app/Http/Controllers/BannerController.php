<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(){
        $data = Banner::all();
        return view('admin.banners.index', compact('data'));
    }
    public function create(){
        return view('admin.banners.create');
    }
    public function store(Request $request){
        $data= $request->except('banner');
        if($request->hasFile('banner')){
            $data['banner'] = Storage::put('banners', $request->file('banner'));
            Banner::query()->create($data);
            return redirect()->route('admin.banners.index');
        }else{
            return view('admin.banners.create');
        }

    }
    public function edit($id){
        $banner = Banner::find($id);
        return view('admin.banners.edit', compact('banner'));
    }
    public function update(Request $request, $id){
        $banner = Banner::find($id);
        $data = $request->except('banner');
        if($request->hasFile('banner')){
            if(!empty($banner->banner) && Storage::exists($banner->banner)){
                Storage::delete($banner->banner);
            }
            $data['banner'] = Storage::put('banners', $request->file('banner'));
        }else{
            $data['banner'] = $banner->banner;
        }
        $banner->update($data);
        return redirect()->route('admin.banners.index');
    }
    public function destroy($id){
        Banner::query()->where('id', $id)->delete();
        return redirect()->route('admin.banners.index');
    }
}
