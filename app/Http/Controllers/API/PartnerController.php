<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\PartnerPostRequest;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{


    public function index()
    {
        return Partner::all();
    }

    public function show(Request $request, Partner $partner)
    {
        return $partner;
    }

    public function store(PartnerPostRequest $request)
    {
        $data = $request->validated();
        $partner = Partner::create($data);
        return $partner;
    }

    public function update(PartnerPostRequest $request, Partner $partner)
    {
        $data = $request->validated();
        $partner->fill($data);
        $partner->save();

        return $partner;
    }

    public function destroy(Request $request, Partner $partner)
    {
        $partner->delete();
        return $partner;
    }

}
