<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotStoreRequest;
use App\Http\Requests\LotUpdateRequest;
use App\Http\Resources\LotCollection;
use App\Http\Resources\LotResource;
use App\Models\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\LotCollection
     */
    public function index(Request $request)
    {
        $lots = Lot::all();

        return new LotCollection($lots);
    }

    /**
     * @param \App\Http\Requests\LotStoreRequest $request
     * @return \App\Http\Resources\LotResource
     */
    public function store(LotStoreRequest $request)
    {
        $lot = Lot::create($request->validated());

        return new LotResource($lot);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lot $lot
     * @return \App\Http\Resources\LotResource
     */
    public function show(Request $request, Lot $lot)
    {
        return new LotResource($lot);
    }

    /**
     * @param \App\Http\Requests\LotUpdateRequest $request
     * @param \App\Models\Lot $lot
     * @return \App\Http\Resources\LotResource
     */
    public function update(LotUpdateRequest $request, Lot $lot)
    {
        $lot->update($request->validated());

        return new LotResource($lot);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lot $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Lot $lot)
    {
        $lot->delete();

        return response()->noContent();
    }
}
