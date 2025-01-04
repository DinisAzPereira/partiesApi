<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
        // campos que o utilizador pode preencher ao criar ou editar uma festa
    protected $fillable = [
        "name",
        "date",
        "location",
        "user_id",

    ];


    public function user() // Relação: Uma festa pertence a um organizador(utilizador)

        {

            return $this->belongsTo(User::class);
        }

        public function guests()
        {

            return $this->hasMany(Guest::class); // uma festa pode ter muitos convidados
        }

        public function activities(){

            return $this-> hasMany(Activity::class); // uma festa pode ter muitas atividades
        }
    
}
