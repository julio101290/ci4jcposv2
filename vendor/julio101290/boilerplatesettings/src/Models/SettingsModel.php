<?php

namespace julio101290\boilerplatesettings\Models;

use CodeIgniter\Model;

class SettingsModel extends Model {

    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'nameCompanie'
        , 'idTax'
        , 'phoneNumber'
        , 'email'
        , 'direction'
        , 'languaje'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'
    ];
}
