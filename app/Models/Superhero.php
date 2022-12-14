<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    use HasFactory;
    protected $fillable = ['heroname','realname','gender','planet_id'];

    protected $with = ['planet'];

    public function planet() {

    	return $this->belongsTo(Planet::class);

        // return $this->belongsTo(Model::class, 'foreign_key', 'owner_key');

    }

    public function superpowers()
    {
  	
	// La taula per seguir convencions Laravel s'hauria d'haver anomenat superhero_superpower!!! 
      
   	return $this->belongsToMany(
       		 Superpower::class,
        	'superheroes_superpowers');
       
     }
}
