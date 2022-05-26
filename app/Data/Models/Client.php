<?php

namespace App\Data\Models;

use App\Services\Client\database\factories\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * @package App\Data\Models
 * @property int id
 * @property string firstName
 * @property string lastName
 * @property string email
 * @property string phoneNumber
 */
class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    /**
     * @return ClientFactory
     */
    protected static function newFactory()
    {
        return ClientFactory::new();
    }

}
