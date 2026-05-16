<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller
{
    public function index(){
           $settings=  Setting::first();
        return view('setting.setting',compact('settings'));
    }
    public function store(Request $request){
     $request->validate([
       'app_name' =>'required| max:100',
         'commission_rate'=>['required','numeric','between:0,1'],
         'about_app'=>'required|min:50',
     ]);
     Setting::create($request->all());
        return redirect()->back()->with('success','Successfully Added Data');
    }
    public function update(Request $request){
        $request->validate([
            'app_name' =>'required| max:100',
            'commission_rate'=>['required','numeric','between:0,1'],
            'about_app'=>'required|min:50',
        ]);
         $setting= Setting::findOrFail($request->id);
          $setting->update($request->all());
        return redirect()->back()->with('success','Successfully Added Data');
    }

    //
}
