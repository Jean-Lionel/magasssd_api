<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeClientStoreRequest;
use App\Http\Requests\TypeClientUpdateRequest;
use App\Http\Resources\TypeClientCollection;
use App\Http\Resources\TypeClientResource;
use App\Models\TypeClient;
use Illuminate\Http\Request;

class TypeClientController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TypeClientCollection
     */
    public function index(Request $request)
    {
        $typeClients = TypeClient::all();

        return new TypeClientCollection($typeClients);
    }

    /**
     * @param \App\Http\Requests\TypeClientStoreRequest $request
     * @return \App\Http\Resources\TypeClientResource
     */
    public function store(TypeClientStoreRequest $request)
    {
        $typeClient = TypeClient::create($request->validated());

        return new TypeClientResource($typeClient);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeClient $typeClient
     * @return \App\Http\Resources\TypeClientResource
     */
    public function show(Request $request, TypeClient $typeClient)
    {
        return new TypeClientResource($typeClient);
    }

    /**
     * @param \App\Http\Requests\TypeClientUpdateRequest $request
     * @param \App\Models\TypeClient $typeClient
     * @return \App\Http\Resources\TypeClientResource
     */
    public function update(TypeClientUpdateRequest $request, TypeClient $typeClient)
    {
        $typeClient->update($request->validated());

        return new TypeClientResource($typeClient);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeClient $typeClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TypeClient $typeClient)
    {
        $typeClient->delete();

        return response()->noContent();
    }
}
