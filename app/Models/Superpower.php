<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superpower extends Model
{
    use HasFactory;
    protected $fillable = [
        'description'
    ];

    public function superheroes()
    {
  	
	// La taula per seguir convencions Laravel s'hauria d'haver anomenat superhero_superpower!!! 
      
   	return $this->belongsToMany(
       		 Superhero::class,
        	'superheroes_superpowers');
       
     }
}