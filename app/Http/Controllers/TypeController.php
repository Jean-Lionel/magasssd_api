<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeStoreRequest;
use App\Http\Requests\TypeUpdateRequest;
use App\Http\Resources\TypeCollection;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TypeCollection
     */
    public function index(Request $request)
    {
        $types = Type::all();

        return new TypeCollection($types);
    }

    /**
     * @param \App\Http\Requests\TypeStoreRequest $request
     * @return \App\Http\Resources\TypeResource
     */
    public function store(TypeStoreRequest $request)
    {
        $type = Type::create($request->validated());

        return new TypeResource($type);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Type $type
     * @return \App\Http\Resources\TypeResource
     */
    public function show(Request $request, Type $type)
    {
        return new TypeResource($type);
    }

    /**
     * @param \App\Http\Requests\TypeUpdateRequest $request
     * @param \App\Models\Type $type
     * @return \App\Http\Resources\TypeResource
     */
    public function update(TypeUpdateRequest $request, Type $type)
    {
        $type->update($request->validated());

        return new TypeResource($type);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Type $type)
    {
        $type->delete();

        return response()->noContent();
    }
}
