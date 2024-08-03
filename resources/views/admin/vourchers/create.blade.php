@extends('layout.admin.master')
@section('title')
    Create new vourcher
@endsection
@section('link')
   vourchers > create new
@endsection
@section('content')

    {{-- <div class="" style="background-color:#fff;margin: 16px 16px 16px 16px;padding: 16px"> --}}
        <form action="{{ route('admin.vourchers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Vourcher Code</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="vourcher_code" >
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Vourcher value</label>
                <input type="number" class=" w-full my-2"
                step="0.1"
                min="0"
                max="1"
                 style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;"
                 name="vourcher_value" >
            </div>
           
            <button type="submit" style="padding: 8px; background-color: rgb(48, 238, 31); width: 120px; border-radius: 10px;margin-bottom: 12px; margin: 0 0 0 16px;">Create</button>
            
        </form>
        
    {{-- </div>    --}}
@endsection