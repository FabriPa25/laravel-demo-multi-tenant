<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    // campi che possono essere scritti in massa
    protected $fillable = ['company_id', 'name', 'email'];

    // ogni cliente appartiene a una company (logica multi-tenant)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}