<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Lot;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LotController
 */
class LotControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $lots = Lot::factory()->count(3)->create();

        $response = $this->get(route('lot.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LotController::class,
            'store',
            \App\Http\Requests\LotStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $product = Product::factory()->create();
        $quantity = $this->faker->randomFloat(/** double_attributes **/);
        $price_unitaire = $this->faker->randomFloat(/** double_attributes **/);
        $price_vente = $this->faker->randomFloat(/** double_attributes **/);
        $description = $this->faker->text;

        $response = $this->post(route('lot.store'), [
            'name' => $name,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price_unitaire' => $price_unitaire,
            'price_vente' => $price_vente,
            'description' => $description,
        ]);

        $lots = Lot::query()
            ->where('name', $name)
            ->where('product_id', $product->id)
            ->where('quantity', $quantity)
            ->where('price_unitaire', $price_unitaire)
            ->where('price_vente', $price_vente)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $lots);
        $lot = $lots->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $lot = Lot::factory()->create();

        $response = $this->get(route('lot.show', $lot));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LotController::class,
            'update',
            \App\Http\Requests\LotUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $lot = Lot::factory()->create();
        $name = $this->faker->name;
        $product = Product::factory()->create();
        $quantity = $this->faker->randomFloat(/** double_attributes **/);
        $price_unitaire = $this->faker->randomFloat(/** double_attributes **/);
        $price_vente = $this->faker->randomFloat(/** double_attributes **/);
        $description = $this->faker->text;

        $response = $this->put(route('lot.update', $lot), [
            'name' => $name,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price_unitaire' => $price_unitaire,
            'price_vente' => $price_vente,
            'description' => $description,
        ]);

        $lot->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $lot->name);
        $this->assertEquals($product->id, $lot->product_id);
        $this->assertEquals($quantity, $lot->quantity);
        $this->assertEquals($price_unitaire, $lot->price_unitaire);
        $this->assertEquals($price_vente, $lot->price_vente);
        $this->assertEquals($description, $lot->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $lot = Lot::factory()->create();

        $response = $this->delete(route('lot.destroy', $lot));

        $response->assertNoContent();

        $this->assertSoftDeleted($lot);
    }
}
