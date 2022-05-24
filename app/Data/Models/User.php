<?php

declare(strict_types=1);

namespace App\Data\Models;

use App\Services\Auth\database\factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Data\Models
 * @property int id
 * @property string name
 * @property string email
 * @property string password
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'users';

    protected $guarded = [];

    /**
     * @return UserFactory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


}
