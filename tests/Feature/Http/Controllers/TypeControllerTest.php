<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TypeController
 */
class TypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $types = Type::factory()->count(3)->create();

        $response = $this->get(route('type.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeController::class,
            'store',
            \App\Http\Requests\TypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $user = User::factory()->create();

        $response = $this->post(route('type.store'), [
            'name' => $name,
            'user_id' => $user->id,
        ]);

        $types = Type::query()
            ->where('name', $name)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $types);
        $type = $types->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $type = Type::factory()->create();

        $response = $this->get(route('type.show', $type));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeController::class,
            'update',
            \App\Http\Requests\TypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $type = Type::factory()->create();
        $name = $this->faker->name;
        $user = User::factory()->create();

        $response = $this->put(route('type.update', $type), [
            'name' => $name,
            'user_id' => $user->id,
        ]);

        $type->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $type->name);
        $this->assertEquals($user->id, $type->user_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $type = Type::factory()->create();

        $response = $this->delete(route('type.destroy', $type));

        $response->assertNoContent();

        $this->assertSoftDeleted($type);
    }
}
