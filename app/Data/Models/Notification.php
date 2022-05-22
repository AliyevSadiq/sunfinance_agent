<?php

declare(strict_types=1);

namespace App\Data\Models;

use BenSampo\Enum\Enum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    use HasFactory,SoftDeletes;

    protected $guarded=[];

    public function client()
    {
        return $this->belongsTo(Client::class,'clientId');
    }

}
