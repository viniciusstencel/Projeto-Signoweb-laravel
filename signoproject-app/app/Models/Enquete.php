<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'title',
        'vote1',
        'vote2',
        'vote3',
        'qtd_vote1',
        'qtd_vote2',
        'qtd_vote3',
        'date',
        'hour_start',
        'hour_end'
    ];
}
