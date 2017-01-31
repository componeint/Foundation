<?php
/**
 * BaseModel.php
 * Created by @rn on 12/28/2016 10:30 AM.
 */

namespace App\Components\Foundation\Models;

use Illuminate\Database\Eloquent\Model;
use App\Components\QueryBasic\Traits\QueryBasic;
use App\Components\Pagination\Traits\Pagination;
use App\Components\DBLog\Traits\DBLog;

class BaseModel extends Model
{
    use QueryBasic;
    use Pagination;
    use DBLog;

    protected $fillable = [];
}
