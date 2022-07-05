<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\PokemonTableSeeder;

class SearchTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api()
    {
        $response = $this->get('/pokemon');

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $data = [
            1 =>  'test11',
           	2 => 'stay',
            3 =>  'go',
            4 => 100,
            5 => 12,
           	6 => 50,
           	7 => 11,
        	8 => 20,
          	9 => 50,
        	10  => 50,
           	11 => 40,
           	12  => 20,
        ];
		

        $pokemon = new PokemonTableSeeder();
        $pokemon->create($data);
        $this->assertDatabaseHas('pokemon', [
            'name' => 'test11'
        ]);
    }

	public function test_url_params(){
  
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
