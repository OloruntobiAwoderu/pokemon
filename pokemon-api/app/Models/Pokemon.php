<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
	
    protected $fillable = 	[
                                'name',
                                'type1',
                                'type2',
                                'total',
                                'hp',
                                'attack',
                                'defense',
                                'sp-attack',
                                'sp-defense',
                                'speed',
                                'generation',
                                'legendary'
                            ];
}
