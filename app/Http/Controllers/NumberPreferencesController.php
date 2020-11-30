<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NumberPreferences;

class NumberPreferencesController extends Controller
{
    public function index()
    {
		$numberPreferences = NumberPreferences::orderBy('name')->paginate(10);
		return view('numberPreferences.index',['numberPreferences'=>$numberPreferences]);
    }

    public function create()
    {
		return view('numberPreferences.create');
    }

    public function store(Request $request)
    {
		$numberPreference = new NumberPreferences;
		$numberPreference->number_id = $request->number_id;
		$numberPreference->name = $request->name;
		$numberPreference->value = $request->value;
		$numberPreference->save();

		return redirect()->route('numberPreferences.index')->with('message','Number preference created successfully!');
    }

    public function show($id){}

    public function edit($id)
    {
	$numberPreference = NumberPreferences::findOrFail($id);
		return view('numberPreferences.edit',compact('numberPreference'));
    }

    public function update(Request $request, $id)
    {
		$numberPreference = NumberPreferences::findOrFail($id);
		$numberPreference->number_id = $request->number_id;
		$numberPreference->name = $request->name;
		$numberPreference->value = $request->value;
		$numberPreference->save();

		return redirect()->route('numberPreferences.index')->with('message','Number preference updated successfully!');
    }    

    public function destroy($id)
    {
		$numberPreference = NumberPreferences::findOrFail($id);
		$numberPreference->delete();
		
		return redirect()->route('numberPreferences.index')->with('alert-success','Number preference removed!');
    }

}
