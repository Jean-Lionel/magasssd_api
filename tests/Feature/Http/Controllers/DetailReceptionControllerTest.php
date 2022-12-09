<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\DetailReception;
use App\Models\Lot;
use App\Models\Product;
use App\Models\Reception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DetailReceptionController
 */
class DetailReceptionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $detailReceptions = DetailReception::factory()->count(3)->create();

        $response = $this->get(route('detail-reception.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DetailReceptionController::class,
            'store',
            \App\Http\Requests\DetailReceptionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $lot = Lot::factory()->create();
        $product = Product::factory()->create();
        $quantity = $this->faker->randomFloat(/** double_attributes **/);
        $prix_unitaire = $this->faker->randomFloat(/** double_attributes **/);
        $reception = Reception::factory()->create();

        $response = $this->post(route('detail-reception.store'), [
            'lot_id' => $lot->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'prix_unitaire' => $prix_unitaire,
            'reception_id' => $reception->id,
        ]);

        $detailReceptions = DetailReception::query()
            ->where('lot_id', $lot->id)
            ->where('product_id', $product->id)
            ->where('quantity', $quantity)
            ->where('prix_unitaire', $prix_unitaire)
            ->where('reception_id', $reception->id)
            ->get();
        $this->assertCount(1, $detailReceptions);
        $detailReception = $detailReceptions->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $detailReception = DetailReception::factory()->create();

        $response = $this->get(route('detail-reception.show', $detailReception));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DetailReceptionController::class,
            'update',
            \App\Http\Requests\DetailReceptionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $detailReception = DetailReception::factory()->create();
        $lot = Lot::factory()->create();
        $product = Product::factory()->create();
        $quantity = $this->faker->randomFloat(/** double_attributes **/);
        $prix_unitaire = $this->faker->randomFloat(/** double_attributes **/);
        $reception = Reception::factory()->create();

        $response = $this->put(route('detail-reception.update', $detailReception), [
            'lot_id' => $lot->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'prix_unitaire' => $prix_unitaire,
            'reception_id' => $reception->id,
        ]);

        $detailReception->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($lot->id, $detailReception->lot_id);
        $this->assertEquals($product->id, $detailReception->product_id);
        $this->assertEquals($quantity, $detailReception->quantity);
        $this->assertEquals($prix_unitaire, $detailReception->prix_unitaire);
        $this->assertEquals($reception->id, $detailReception->reception_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $detailReception = DetailReception::factory()->create();

        $response = $this->delete(route('detail-reception.destroy', $detailReception));

        $response->assertNoContent();

        $this->assertSoftDeleted($detailReception);
    }
}
