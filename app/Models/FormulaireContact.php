<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaireContact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'formulaire_contact';

    use HasFactory;

    protected $guarded = [];
}
