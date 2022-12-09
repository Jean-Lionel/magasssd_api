<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TypeClient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TypeClientController
 */
class TypeClientControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $typeClients = TypeClient::factory()->count(3)->create();

        $response = $this->get(route('type-client.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeClientController::class,
            'store',
            \App\Http\Requests\TypeClientStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;

        $response = $this->post(route('type-client.store'), [
            'name' => $name,
        ]);

        $typeClients = TypeClient::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $typeClients);
        $typeClient = $typeClients->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $typeClient = TypeClient::factory()->create();

        $response = $this->get(route('type-client.show', $typeClient));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeClientController::class,
            'update',
            \App\Http\Requests\TypeClientUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $typeClient = TypeClient::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('type-client.update', $typeClient), [
            'name' => $name,
        ]);

        $typeClient->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $typeClient->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $typeClient = TypeClient::factory()->create();

        $response = $this->delete(route('type-client.destroy', $typeClient));

        $response->assertNoContent();

        $this->assertSoftDeleted($typeClient);
    }
}
