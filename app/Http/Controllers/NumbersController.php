<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Numbers;
use App\Models\Customers;

class NumbersController extends Controller
{
    public function index($id)
    {
		$customer = Customers::findOrFail($id);
		$numbers = Numbers::orderBy('number')->get();

		return view('numbers.index',['numbers'=>$numbers, 'customer'=>$customer]);
    }

    public function create()
    {
		return view('numbers.create');
    }

    public function store(Request $request)
    {
		$number = new Numbers;
		$number->customer_id = $request->customer_id;
		$number->number = $request->number;
		$number->status = $request->status;
		$number->save();

		return redirect()->route('numbers.index')->with('message','Number created successfully!');
    }

    public function show($id){}

    public function edit($id)
    {
		$number = Numbers::findOrFail($id);

		return view('numbers.edit',compact('number'));
    }

    public function update(Request $request, $id)
    {
		$number = Numbers::findOrFail($id);
		$number->customer_id = $request->customer_id;
		$number->number = $request->number;
		$number->status = $request->status;
		$number->save();

		return redirect()->route('numbers.index')->with('message','Number updated successfully!');
    }    

    public function destroy($id)
    {
		$number = Numbers::findOrFail($id);
		$number->delete();
		
		return redirect()->route('numbers.index')->with('alert-success','Number removed!');
    }

}
