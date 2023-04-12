<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Charge;
use App\Models\Dependence;
use App\Models\User;
use App\Models\Pass;

class passTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /*
    public function test_guest_pass(): void
    {
        $this->get('passes')->assertRedirect('login'); //index
        $this->get('passes/1')->assertRedirect('login'); //show
        $this->get('passes/i/edit')->assertRedirect('login'); //formulario editar
        $this->put('passes/1')->assertRedirect('login'); //editar - update
        $this->delete('passes/1')->assertRedirect('login'); //destroy - eliminar
        $this->get('passes/create')->assertRedirect('login'); //formulario - crear nuevo
        $this->post('passes', [])->assertRedirect('login'); //store - guardar nuevo
    }
    
    public function test_index_empty()
    {
        Pass::factory()->create();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get('passes')
            ->assertStatus(200)
            ->assertSee('No hay Permisos Creados');

    }
    
    public function test_create()
    {
        $user = User::factory()->create();
        dd($user);
        $this
            ->actingAs($user)
            ->get('passes/create')
            ->assertStatus(200);

    }
    */
    /*
    public function test_store()
    {   
        
        //$charge = Charge::factory()->create();
        //$dependence = Dependence::factory()->create();

        $data = [
            //'charge_id' => $charge->id,
            //'dependence_id' => $dependence->id,

            'ncard' => $this->faker->randomDigitNot(6),
            'name' => $this->faker->name(),
            'motive' => $this->faker->sentence(),
            'place' => $this->faker->secondaryAddress(),
            'observation' => $this->faker->sentence(25),
            'time' => $this->faker->time(),
            'input' => $this->faker->time(),
            'output' => $this->faker->time(),
            'date' => $this->faker->date(),
        ];
        //dd($data);

        $user = User::factory()->create();
        //dd($user);
        $this
            ->actingAs($user)
            ->post('passes', $data)
            ->assertRedirect('passes');

        $this->assertDatabaseHas('passes', $data);
        
    }
    */
}
