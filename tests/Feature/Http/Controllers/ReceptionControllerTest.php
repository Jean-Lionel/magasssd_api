<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Reception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ReceptionController
 */
class ReceptionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $receptions = Reception::factory()->count(3)->create();

        $response = $this->get(route('reception.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReceptionController::class,
            'store',
            \App\Http\Requests\ReceptionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $montant = $this->faker->randomFloat(/** double_attributes **/);
        $montant_total = $this->faker->randomFloat(/** double_attributes **/);

        $response = $this->post(route('reception.store'), [
            'montant' => $montant,
            'montant_total' => $montant_total,
        ]);

        $receptions = Reception::query()
            ->where('montant', $montant)
            ->where('montant_total', $montant_total)
            ->get();
        $this->assertCount(1, $receptions);
        $reception = $receptions->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $reception = Reception::factory()->create();

        $response = $this->get(route('reception.show', $reception));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReceptionController::class,
            'update',
            \App\Http\Requests\ReceptionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $reception = Reception::factory()->create();
        $montant = $this->faker->randomFloat(/** double_attributes **/);
        $montant_total = $this->faker->randomFloat(/** double_attributes **/);

        $response = $this->put(route('reception.update', $reception), [
            'montant' => $montant,
            'montant_total' => $montant_total,
        ]);

        $reception->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($montant, $reception->montant);
        $this->assertEquals($montant_total, $reception->montant_total);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $reception = Reception::factory()->create();

        $response = $this->delete(route('reception.destroy', $reception));

        $response->assertNoContent();

        $this->assertSoftDeleted($reception);
    }
}
