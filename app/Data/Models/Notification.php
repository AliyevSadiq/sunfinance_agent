<?php

declare(strict_types=1);

namespace App\Data\Models;

use App\Services\Notification\database\factories\NotificationFactory;
use BenSampo\Enum\Enum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * @package App\Data\Models
 * @property int id
 * @property int clientId
 * @property Enum channel
 * @property string content
 */
class Notification extends Model
{

    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * @return NotificationFactory
     */
    protected static function newFactory(): NotificationFactory
    {
        return NotificationFactory::new();
    }


    public function client()
    {
        return $this->belongsTo(Client::class, 'clientId');
    }

}
