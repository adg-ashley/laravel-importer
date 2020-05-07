<?php
namespace Adg\Importer\Eloquent;

use Illuminate\Database\Eloquent\Model;
use  Adg\Importer\Traits\MapHelpers;
/**
* Model of the table tasks.
*/
class Account extends Model
{
    use MapHelpers;

    protected $connection = "mysql2";

    protected $table = "accounts";

    protected $map = [
        "acount_id" =>  "acount_id",
        "name" =>  "account_name"
    ];
    
    public function getMapAttribute() {
        return $this->map;
    }
}