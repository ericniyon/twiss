<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\PartnerPostRequest;
use App\Models\Partner;


class PartnerController extends Controller
{

    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function show(Request $request, Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
       $request->validate( [
            'name' => 'required',
           
            'logo' => 
            'required|image',
          
            'contract' => 
            'required|mimes:pdf,doc,docx',
         
            'tel' => 
                'required',
            
            'email' => 
                'required',
            
            'web_link' => 
                'required',
            
        ]);
        $logo = time().'.'.$request->logo->extension();  
        $request->logo->storeAs('partners/logos',$logo, 'public');
        $contract = time().'.'.$request->contract->extension();  
        $request->contract->storeAs('partners/contracts',$contract, 'public');
        $partner= new Partner;
        $partner->logo=$logo;
        $partner->contract=$contract;
        $partner->tel=$request->tel;
        $partner->email=$request->email;
        $partner->name=$request->name;
        $partner->web_link=$request->web_link;
        $partner->save();

        
        return redirect()->route('partners.index')->with('status', 'Partner created!');
    }

    public function edit(Request $request, Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(PartnerPostRequest $request, Partner $partner)
    {
        $data = $request->validated();
        $partner->fill($data);
        $partner->save();
        return redirect()->route('partners.index')->with('status', 'Partner updated!');
    }

    public function destroy(Request $request, Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with('status', 'Partner destroyed!');
    }
}
