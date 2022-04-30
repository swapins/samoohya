<?php

namespace App\Http\Controllers;

use App\Package;
use App\Service;
use App\service_in_package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
  public function index(){
      $packages = Package::all();
      $services = Service::where('status',true)->get();
      $serv_all = Service::all();
      return view('admin.package',compact("packages","services","serv_all"));

  }

  public function add(Request $request){
    //dd($request);
    $done = Package::create($request->all());
    $id = $done->id;
    $service_array = $request->input('service');
    for ($x = 0; $x < count($service_array); $x++){
      service_in_package::create([
        'package_id' => $id, 
        'service_name' => $service_array[$x]
      ]);
    }


    
    return redirect()->back();
  }

  public function edit_service(Request $request){
    //dd($request);
    Package::findOrFail($request->input('id'))->update($request->all());
    return redirect()->back();
  }

  public function delete_service(Request $request){

    $ids = service_in_package::where('package_id',$request->input('id'))->pluck('id');
    service_in_package::whereIn('id', $ids)->delete();
    Package::findOrFail($request->input('id'))->delete();
    return redirect()->back();
  }
}
