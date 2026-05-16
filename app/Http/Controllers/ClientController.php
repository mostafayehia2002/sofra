<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    //

    public function index(){
        $clients=Client::with('region')->get();
        $activeClients=Client::where('status','active')->count();
        $suspendedClients=count($clients)-$activeClients;
        $newClients = Client::whereDate('created_at', today())->count();
        return view('clients.index',compact('clients','activeClients','suspendedClients', 'newClients'));
    }

    public function delete($id){
        $client=Client::findOrFail($id);
        Storage::disk('client')->delete('client_image/profile/'.$client->photo);
        $client->delete();
        return redirect()->back()
            ->with('success','Successfully Deleted Client');
    }
    public function status($id){
        $client=Client::findOrFail($id);
        if($client->status=='active'){
            $client->update(['status'=>'suspended']);
        }else{
            $client->update(['status'=>'active']);
        }

        return redirect()->back()->with('success', 'Successfully Changed Status');
    }
}
