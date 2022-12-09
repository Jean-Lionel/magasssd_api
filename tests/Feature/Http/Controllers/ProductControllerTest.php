<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductController
 */
class ProductControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $products = Product::factory()->count(3)->create();

        $response = $this->get(route('product.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'store',
            \App\Http\Requests\ProductStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $unite_mesure = $this->faker->word;
        $nombre_bouteille = $this->faker->randomFloat(/** float_attributes **/);
        $user = User::factory()->create();

        $response = $this->post(route('product.store'), [
            'name' => $name,
            'unite_mesure' => $unite_mesure,
            'nombre_bouteille' => $nombre_bouteille,
            'user_id' => $user->id,
        ]);

        $products = Product::query()
            ->where('name', $name)
            ->where('unite_mesure', $unite_mesure)
            ->where('nombre_bouteille', $nombre_bouteille)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $products);
        $product = $products->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.show', $product));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'update',
            \App\Http\Requests\ProductUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $product = Product::factory()->create();
        $name = $this->faker->name;
        $unite_mesure = $this->faker->word;
        $nombre_bouteille = $this->faker->randomFloat(/** float_attributes **/);
        $user = User::factory()->create();

        $response = $this->put(route('product.update', $product), [
            'name' => $name,
            'unite_mesure' => $unite_mesure,
            'nombre_bouteille' => $nombre_bouteille,
            'user_id' => $user->id,
        ]);

        $product->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $product->name);
        $this->assertEquals($unite_mesure, $product->unite_mesure);
        $this->assertEquals($nombre_bouteille, $product->nombre_bouteille);
        $this->assertEquals($user->id, $product->user_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('product.destroy', $product));

        $response->assertNoContent();

        $this->assertSoftDeleted($product);
    }
}
