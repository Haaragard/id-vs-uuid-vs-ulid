<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'second_name',
        'second_email',
    ];

    /**
     * @return HasOne
     */
    public function idUser(): HasOne
    {
        return $this->hasOne(IdUser::class);
    }

    /**
     * @return HasOne
     */
    public function UuidUser(): HasOne
    {
        return $this->hasOne(UuidUser::class);
    }

    /**
     * @return HasOne
     */
    public function UlidUser(): HasOne
    {
        return $this->hasOne(UlidUser::class);
    }
}
