<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockStoreRequest;
use App\Http\Requests\StockUpdateRequest;
use App\Http\Resources\StockCollection;
use App\Http\Resources\StockResource;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\StockCollection
     */
    public function index(Request $request)
    {
        $stocks = Stock::all();

        return new StockCollection($stocks);
    }

    /**
     * @param \App\Http\Requests\StockStoreRequest $request
     * @return \App\Http\Resources\StockResource
     */
    public function store(StockStoreRequest $request)
    {
        $stock = Stock::create($request->validated());

        return new StockResource($stock);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Stock $stock
     * @return \App\Http\Resources\StockResource
     */
    public function show(Request $request, Stock $stock)
    {
        return new StockResource($stock);
    }

    /**
     * @param \App\Http\Requests\StockUpdateRequest $request
     * @param \App\Models\Stock $stock
     * @return \App\Http\Resources\StockResource
     */
    public function update(StockUpdateRequest $request, Stock $stock)
    {
        $stock->update($request->validated());

        return new StockResource($stock);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Stock $stock)
    {
        $stock->delete();

        return response()->noContent();
    }
}
