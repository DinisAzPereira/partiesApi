<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;



    protected $fillable = [
        'party_id',
        'user_id',
        'status',


    ];

// Relação: Um convidado pertence a uma festa
    public function party()
    {
        return $this->belongsTo(Party::class);

    }

// Relação: Um convidado pertence a um unico utilizador (organizador)
    public function user()
    {

        return $this->belongsTo(User::class);
    }

}
