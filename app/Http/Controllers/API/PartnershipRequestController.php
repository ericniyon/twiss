<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\PartnershipRequestPostRequest;
use App\Http\Controllers\Controller;
use App\Models\PartnershipRequest;

class PartnershipRequestController extends Controller
{


    public function index()
    {
        return PartnershipRequest::all();
    }

    public function show(Request $request, PartnershipRequest $partnership_request)
    {
        return $partnership_request;
    }

    public function store(PartnershipRequestPostRequest $request)
    {
        $data = $request->validated();
        $partnership_request = PartnershipRequest::create($data);
        return $partnership_request;
    }

    public function update(PartnershipRequestPostRequest $request, PartnershipRequest $partnership_request)
    {
        $data = $request->validated();
        $partnership_request->fill($data);
        $partnership_request->save();

        return $partnership_request;
    }

    public function destroy(Request $request, PartnershipRequest $partnership_request)
    {
        $partnership_request->delete();
        return $partnership_request;
    }

}
