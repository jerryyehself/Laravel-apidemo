<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    // public $timestamps = false;

    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'site',
        'phone'
    ];

    // public function staffDepartments()
    // {
    //     return $this->belongsToMany(Department::class, 'contact_lists')->withPivot('user_id');
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'contact_lists');
    }


    public function staffDepartments()
    {
        return $this->hasManyThrough(Department::class, User::class);
    }
}
