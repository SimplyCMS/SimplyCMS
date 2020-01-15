<?php

namespace System\Database\Models;

use Illuminate\Database\Eloquent\Model;
use SimplyCMS\Support\Traits\GetModelTableName;

/**
 * Class Setting
 *
 * @package System\Database\Models
 */
class Setting extends Model
{
    use GetModelTableName;
    
    protected $table = "simplycms_system_settings";
    protected $guarded = [];
}
