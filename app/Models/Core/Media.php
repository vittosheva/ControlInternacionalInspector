<?php

namespace App\Models\Core;

use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;
use Wildside\Userstamps\Userstamps;

class Media extends BaseMedia implements Auditable
{
    use AuditableTrait;
    use Userstamps;

    protected $connection = 'mysql';
}
