<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function index()
    {
		$customers = Customers::where('user_id',auth()->user()->id)->orderBy('name')->get();
		return view('customers.list',['customers'=>$customers]);
    }

    public function create()
    {
		return view('customers.create');
	}
	
	protected function validation($request)
	{
		$rules = [
			'name' => 'required',
			'document' => 'required|string|min:6|max:12',
		];

		$this->validate($request , $rules);
	}

    public function store(Request $request)
    {

		$this->validation($request);

		$customer = new Customers;		
		$customer->name = $request->name;
		$customer->document = $request->document;
		$customer->status = $request->status;
		$customer->user_id = auth()->user()->id;
		$customer->save();        

		return redirect()->route('number.customer',['id'=>$customer->id])->withStatus(__('Customer created successfully! Now you can add numbers to this customer.'));
    }

    public function show($id){}

    public function edit($id)
    {
		$customer = Customers::findOrFail($id);
		return view('customers.edit',['customer'=>$customer]);
    }

    public function update(Request $request, $id)
    {

		$this->validation($request);

		$customer = Customers::findOrFail($id);
		$customer->update($request->all());

		return back()->withStatus(__('Customer updated successfully!'));
    }    

    public function delete($id)
    {
		$customer = Customers::findOrFail($id);
		$customer->delete();
		
		return back()->withStatus(__('Customer deleted successfully!'));
    }

}
