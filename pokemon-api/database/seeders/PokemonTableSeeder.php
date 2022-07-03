<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pokemon::truncate();
    
        $row = 1;
        if (($handle = fopen('/Users/oloruntobiawoderu/Documents/pokemon-api-1-rjxgrf/pokemon-api/Data/pokemon.csv', 'r', 1)) !== false) {
            while (($data = fgetcsv($handle, 100, ",")) !== false) {
                if ($data[2] !== 'Ghost' && $data[3] !== 'Ghost' && $data[12] == 'False' && $data[0] !== '#') {
                    if ($data[2] === 'Steel'|| $data[3] === 'Steel') {
                        if (!empty($data[5])) {
                            $data[5] *= 2;
                            \App\Models\Pokemon::create([
                                'name' =>  $data[1],
                                'type1' => $data[2],
                                'type2' =>  $data[3],
                                'total' => $data[4],
                                'hp' => $data[5],
                                'attack' => $data[6],
                                'defense' => $data[7],
                                'sp-attack' => $data[8],
                                'sp-defense' => $data[9],
                                'speed'  => $data[10],
                                'generation'  => $data[11],
                                'legendary'  => $data[12],
                            ]);
                        }
                    } elseif ($data[2] === 'Bug' && $data[3] === 'Flying') {
                        $percent = ($data[8] * 10)/100;
                        $data[8] += $percent;
                        \App\Models\Pokemon::create([
                            'name' =>  $data[1],
                            'type1' => $data[2],
                            'type2' =>  $data[3],
                            'total' => $data[4],
                            'hp' => $data[5],
                            'attack' => $data[6],
                            'defense' => $data[7],
                            'sp-attack' => $data[8],
                            'sp-defense' => $data[9],
                            'speed'  => $data[10],
                            'generation'  => $data[11],
                            'legendary'  => $data[12],
                        ]);
                    } elseif (preg_match("/^G/", $data[1])) {
                        $remove_whitespace = str_replace(' ', '', $data[1]);
                        $length_of_string = strlen($remove_whitespace);
                        $num_of_occurrences = substr_count($data[1], 'G');
                        $total_val = ($length_of_string - $num_of_occurrences) * 5;
                        $data[7] += $total_val;
                        \App\Models\Pokemon::create([
                            'name' =>  $data[1],
                            'type1' => $data[2],
                            'type2' =>  $data[3],
                            'total' => $data[4],
                            'hp' => $data[5],
                            'attack' => $data[6],
                            'defense' => $data[7],
                            'sp-attack' => $data[8],
                            'sp-defense' => $data[9],
                            'speed'  => $data[10],
                            'generation'  => $data[11],
                            'legendary'  => $data[12],
                        ]);
                    }
                }
            }
            fclose($handle);
        }
    }
}
