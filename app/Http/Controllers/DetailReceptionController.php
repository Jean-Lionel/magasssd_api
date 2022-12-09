<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailReceptionStoreRequest;
use App\Http\Requests\DetailReceptionUpdateRequest;
use App\Http\Resources\DetailReceptionCollection;
use App\Http\Resources\DetailReceptionResource;
use App\Models\DetailReception;
use Illuminate\Http\Request;

class DetailReceptionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\DetailReceptionCollection
     */
    public function index(Request $request)
    {
        $detailReceptions = DetailReception::all();

        return new DetailReceptionCollection($detailReceptions);
    }

    /**
     * @param \App\Http\Requests\DetailReceptionStoreRequest $request
     * @return \App\Http\Resources\DetailReceptionResource
     */
    public function store(DetailReceptionStoreRequest $request)
    {
        $detailReception = DetailReception::create($request->validated());

        return new DetailReceptionResource($detailReception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DetailReception $detailReception
     * @return \App\Http\Resources\DetailReceptionResource
     */
    public function show(Request $request, DetailReception $detailReception)
    {
        return new DetailReceptionResource($detailReception);
    }

    /**
     * @param \App\Http\Requests\DetailReceptionUpdateRequest $request
     * @param \App\Models\DetailReception $detailReception
     * @return \App\Http\Resources\DetailReceptionResource
     */
    public function update(DetailReceptionUpdateRequest $request, DetailReception $detailReception)
    {
        $detailReception->update($request->validated());

        return new DetailReceptionResource($detailReception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DetailReception $detailReception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DetailReception $detailReception)
    {
        $detailReception->delete();

        return response()->noContent();
    }
}
