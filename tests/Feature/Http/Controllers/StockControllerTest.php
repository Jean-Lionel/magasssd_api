<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Stock;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StockController
 */
class StockControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $stocks = Stock::factory()->count(3)->create();

        $response = $this->get(route('stock.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StockController::class,
            'store',
            \App\Http\Requests\StockStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $type = Type::factory()->create();
        $user = User::factory()->create();

        $response = $this->post(route('stock.store'), [
            'name' => $name,
            'type_id' => $type->id,
            'user_id' => $user->id,
        ]);

        $stocks = Stock::query()
            ->where('name', $name)
            ->where('type_id', $type->id)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $stocks);
        $stock = $stocks->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $stock = Stock::factory()->create();

        $response = $this->get(route('stock.show', $stock));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StockController::class,
            'update',
            \App\Http\Requests\StockUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $stock = Stock::factory()->create();
        $name = $this->faker->name;
        $type = Type::factory()->create();
        $user = User::factory()->create();

        $response = $this->put(route('stock.update', $stock), [
            'name' => $name,
            'type_id' => $type->id,
            'user_id' => $user->id,
        ]);

        $stock->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $stock->name);
        $this->assertEquals($type->id, $stock->type_id);
        $this->assertEquals($user->id, $stock->user_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $stock = Stock::factory()->create();

        $response = $this->delete(route('stock.destroy', $stock));

        $response->assertNoContent();

        $this->assertSoftDeleted($stock);
    }
}
