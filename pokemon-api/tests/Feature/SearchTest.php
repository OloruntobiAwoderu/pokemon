<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\PokemonTableSeeder;
use Illuminate\Support\Facades\Artisan;

class SearchTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    public function test_api()
    {
        $response = $this->get('/pokemon');

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->assertDatabaseHas('pokemon', [
            'name' => 'Bulbasaur'
        ]);
    }

    public function test_url_params()
    {
        $response = $this->get('/pokemon?page=1');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    "id",
                    "name",
                    "type1",
                    "type2",
                    "total",
                    "hp",
                    "attack",
                    "defense",
                    "sp-attack",
                    "sp-defense",
                     "speed",
                    "generation",
                    "legendary",
                    "created_at",
                    "updated_at"
                ]
            ]
        ]);
    }
}
