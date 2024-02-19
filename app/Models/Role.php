<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['role', 'status'];

    // Have many to many with privilage
    public function privileges(): BelongsToMany
    {
        return $this->belongsToMany(Privilage::class, 'roles_privilages');
    }

    // Many to one with users
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
