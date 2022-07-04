<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonTableSeeder extends Seeder
{
    /**
     * Run the function to create new rows in the database.
     *
     * @return void
     */

    public function create($data)
    {
        return Pokemon::create([
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

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pokemon::truncate();
        if (($handle = fopen(__DIR__ . '/Data/pokemon.csv', 'r', 1)) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                if ($data[2] !== 'Ghost' && $data[3] !== 'Ghost' && $data[12] == 'False' && $data[0] !== '#') {
                    if ($data[2] === 'Steel'|| $data[3] === 'Steel') {
                        if (!empty($data[5])) {
                            $data[5] *= 2;
                            $this->create($data);
                        }
                    } elseif ($data[2] === 'Bug' && $data[3] === 'Flying') {
                        $percent = ($data[8] * 10)/100;
                        $data[8] += $percent;
                        $this->create($data);
                    } elseif (preg_match("/^G/", $data[1])) {
                        $remove_whitespace = str_replace(' ', '', $data[1]);
                        $length_of_string = strlen($remove_whitespace);
                        $num_of_occurrences = substr_count($data[1], 'G');
                        $total_val = ($length_of_string - $num_of_occurrences) * 5;
                        $data[7] += $total_val;
                        $this->create($data);
                    }
                }
            }
            fclose($handle);
        }
    }
}
