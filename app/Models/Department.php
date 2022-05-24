<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    // public $timestamps = false;


    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function companies()
    {
        $companies = $this->users()
            ->get()
            ->map
            ->only('id')
            ->map(function ($user) {
                return User::find($user['id'])->companies;
            });

        return $companies->collapse()->map->only([
            'id',
            'name',
            'contact_person',
            'site',
            'phone'
        ])->unique();
    }
}
