<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    //
    public function searchPokemon(Request $request)
    {
        $name = $request->input('name');
        $name ? $name : $name = '';
        $hp = $request->input('hp');
        $attack = $request->input('attack');
        $defense = $request->input('defense');
		$page = $request->input('page');
        $hp_greater_than_equal = null;
        $hp_less_than_equal = null;
        $hp_greater_than = null;
        $hp_less_than = null;
        $attack_greater_than_equal = null;
        $attack_less_than_equal = null;
        $attack_greater_than = null;
        $attack_less_than = null;
        $defense_greater_than_equal = null;
        $defense_less_than_equal = null;
        $defense_greater_than = null;
        $defense_less_than = null;
        if ($hp) {
            if (array_key_exists('gte', $hp)) {
                $hp_greater_than_equal = intval($hp['gte']);
            } elseif (array_key_exists('lte', $hp)) {
                $hp_less_than_equal = intval($hp['lte']);
            } elseif (array_key_exists('gt', $hp)) {
                $hp_greater_than = intval($hp['gt']);
            } elseif (array_key_exists('lt', $hp)) {
                $hp_less_than = intval($hp['lt']);
            }
        }
        if ($attack) {
            if (array_key_exists('gte', $attack)) {
                $attack_greater_than_equal = intval($attack['gte']);
            } elseif (array_key_exists('lte', $attack)) {
                $attack_less_than_equal = intval($attack['lte']);
            } elseif (array_key_exists('gt', $attack)) {
                $attack_greater_than = intval($attack['gt']);
            } elseif (array_key_exists('lt', $attack)) {
                $attack_less_than = intval($attack['lt']);
            }
        }
        if ($defense) {
            if (array_key_exists('gte', $defense)) {
                $defense_greater_than_equal = intval($defense['gte']);
            } elseif (array_key_exists('lte', $defense)) {
                $defense_less_than_equal = intval($defense['lte']);
            } elseif (array_key_exists('gt', $defense)) {
                $defense_greater_than = intval($defense['gt']);
            } elseif (array_key_exists('lt', $defense)) {
                $defense_less_than = intval($defense['lt']);
            }
        }
     
        
        $pokemon = Pokemon::where('name', 'LIKE', '%' . $name . '%')->when($hp_greater_than_equal, function ($query, $hp_greater_than_equal) {
            $query->where('hp', '>=', $hp_greater_than_equal);
        })->when($hp_less_than_equal, function ($query, $hp_less_than_equal) {
            $query->where('hp', '<=', $hp_less_than_equal);
        })->when($hp_greater_than, function ($query, $hp_greater_than) {
            $query->where('hp', '>', $hp_greater_than);
        })->when($hp_less_than, function ($query, $hp_less_than) {
            $query->where('hp', '<', $hp_less_than);
        })->when($attack_greater_than_equal, function ($query, $attack_greater_than_equal) {
            $query->where('attack', '>=', $attack_greater_than_equal);
        })->when($attack_less_than_equal, function ($query, $attack_less_than_equal) {
            $query->where('attack', '<=', $attack_less_than_equal);
        })->when($attack_greater_than, function ($query, $attack_greater_than) {
            $query->where('attack', '>', $attack_greater_than);
        })->when($attack_less_than, function ($query, $attack_less_than) {
            $query->where('attack', '<', $attack_less_than);
        })->when($defense_greater_than_equal, function ($query, $defense_greater_than_equal) {
            $query->where('defense', '>=', $defense_greater_than_equal);
        })->when($defense_less_than_equal, function ($query, $defense_less_than_equal) {
            $query->where('defense', '<=', $defense_less_than_equal);
        })->when($defense_greater_than, function ($query, $defense_greater_than) {
            $query->where('defense', '>', $defense_greater_than);
        })->when($defense_less_than, function ($query, $defense_less_than) {
            $query->where('defense', '<', $defense_less_than);
        })->simplePaginate(10);
        return $pokemon;
    }
}
