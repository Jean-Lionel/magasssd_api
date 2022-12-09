<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceptionStoreRequest;
use App\Http\Requests\ReceptionUpdateRequest;
use App\Http\Resources\ReceptionCollection;
use App\Http\Resources\ReceptionResource;
use App\Models\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ReceptionCollection
     */
    public function index(Request $request)
    {
        $receptions = Reception::all();

        return new ReceptionCollection($receptions);
    }

    /**
     * @param \App\Http\Requests\ReceptionStoreRequest $request
     * @return \App\Http\Resources\ReceptionResource
     */
    public function store(ReceptionStoreRequest $request)
    {
        $reception = Reception::create($request->validated());

        return new ReceptionResource($reception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reception $reception
     * @return \App\Http\Resources\ReceptionResource
     */
    public function show(Request $request, Reception $reception)
    {
        return new ReceptionResource($reception);
    }

    /**
     * @param \App\Http\Requests\ReceptionUpdateRequest $request
     * @param \App\Models\Reception $reception
     * @return \App\Http\Resources\ReceptionResource
     */
    public function update(ReceptionUpdateRequest $request, Reception $reception)
    {
        $reception->update($request->validated());

        return new ReceptionResource($reception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reception $reception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reception $reception)
    {
        $reception->delete();

        return response()->noContent();
    }
}
