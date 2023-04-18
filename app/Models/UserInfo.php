<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_infos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'user_uuid',
        'user_ulid',
        'name',
        'second_name',
        'email',
        'second_email',
    ];

    /**
     * @return BelongsTo
     */
    public function idUser(): BelongsTo
    {
        return $this->belongsTo(IdUser::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function uuidUser(): BelongsTo
    {
        return $this->belongsTo(UuidUser::class, 'user_uuid', 'uuid');
    }

    /**
     * @return BelongsTo
     */
    public function ulidUser(): BelongsTo
    {
        return $this->belongsTo(UlidUser::class, 'user_ulid', 'ulid');
    }
}
