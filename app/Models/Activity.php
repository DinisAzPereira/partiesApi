<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'party_id', // Relaciona a atividade a uma festa



    ];


        public function Parties(){

            return $this->belongsTo(Party::class);

        }


}
