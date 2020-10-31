<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\PartnershipRequestPostRequest;
use App\Models\PartnershipRequest;


class PartnershipRequestController extends Controller
{

    public function index()
    {
        $partnership_requests = PartnershipRequest::all();
        return view('admin.partnership_requests.index', compact('partnership_requests'));
    }

    public function show(Request $request, PartnershipRequest $partnership_request)
    {
        return view('admin.partnership_requests.show', compact('partnership_request'));
    }

    public function create()
    {
        return view('admin.partnership_requests.create');
    }

    public function store(PartnershipRequestPostRequest $request)
    {
        $data = $request->validated();
        $partnership_request = PartnershipRequest::create($data);
        return redirect()->route('partnership-requests.index')->with('status', 'PartnershipRequest created!');
    }

    public function edit(Request $request, PartnershipRequest $partnership_request)
    {
        return view('admin.partnership_requests.edit', compact('partnership_request'));
    }

    public function update(PartnershipRequestPostRequest $request, PartnershipRequest $partnership_request)
    {
        $data = $request->validated();
        $partnership_request->fill($data);
        $partnership_request->save();
        return redirect()->route('partnership-requests.index')->with('status', 'PartnershipRequest updated!');
    }

    public function destroy(Request $request, PartnershipRequest $partnership_request)
    {
        $partnership_request->delete();
        return redirect()->route('partnership-requests.index')->with('status', 'PartnershipRequest destroyed!');
    }
}
