<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $table='clients';

}
