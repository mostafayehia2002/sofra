<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    //
    public function index(){

      $restaurants=  Restaurant::with('region')->orderBy('created_at','desc')->get();
        $open=Restaurant::where('status','open')->count();
        $closed=Restaurant::where('status','closed')->count();
        $newRestaurant=Restaurant::whereDate('created_at', today())->count();
      return view('restaurants.index',compact('restaurants','open','closed','newRestaurant'));
    }
//
    public function delete($id){
      $restaurant=  Restaurant::findOrFail($id)->first();
      $image=$restaurant->image;
      Storage::disk('restaurants')->delete('profile/'.$image);
      $restaurant->delete();
      return redirect()->back()->with('success','Successfully Deleted Restaurant');
    }
    //
    public function  status(Request $request){
        $restaurant=  Restaurant::findOrFail($request->id)->first();
        if($restaurant->status=='open'){
            $restaurant->update(['status'=>'closed']);
        }else{
            $restaurant->update(['status'=>'open']);
        }

        return redirect()->back()->with('success','Successfully Changed Status Of Restaurant');
    }
    //

    public function  profile($id){
        $restaurant=Restaurant::with(['region','products','offers','categories','orders','reviews'])->orderBy('created_at','desc')->where('id',$id)->first();
        return view('restaurants.profile',compact('restaurant'));
    }
}
