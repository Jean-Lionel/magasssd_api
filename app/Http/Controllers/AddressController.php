<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\AddressCollection
     */
    public function index(Request $request)
    {
        $addresses = Address::all();

        return new AddressCollection($addresses);
    }

    /**
     * @param \App\Http\Requests\AddressStoreRequest $request
     * @return \App\Http\Resources\AddressResource
     */
    public function store(AddressStoreRequest $request)
    {
        $address = Address::create($request->validated());

        return new AddressResource($address);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Address $address
     * @return \App\Http\Resources\AddressResource
     */
    public function show(Request $request, Address $address)
    {
        return new AddressResource($address);
    }

    /**
     * @param \App\Http\Requests\AddressUpdateRequest $request
     * @param \App\Models\Address $address
     * @return \App\Http\Resources\AddressResource
     */
    public function update(AddressUpdateRequest $request, Address $address)
    {
        $address->update($request->validated());

        return new AddressResource($address);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Address $address)
    {
        $address->delete();

        return response()->noContent();
    }
}
