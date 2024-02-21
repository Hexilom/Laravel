<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InfoRequest;
use App\Models\Info;

class InfoController extends Controller
{
    public function index(){
        $infos = Info::get();
        return view('index',compact('infos'));
    }
    
    public function create(){
        return view('create');
    }

    public function store(InfoRequest $request){
        $filename = time().'.'.$request->file->extension();
       // $request->file->move(public_path('images'),$filename);

        $request->file->storeAs('public/images',$filename);

        $info = new Info;
        $info->name = $request->name;
        $info->file_uri = $filename;
        $info->save();

        return redirect()->route('index');
    }
}
