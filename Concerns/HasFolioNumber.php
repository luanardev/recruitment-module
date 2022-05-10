<?php

namespace Luanardev\Modules\Recruitment\Concerns;
use Haruncpi\LaravelIdGenerator\IdGenerator;


trait HasFolioNumber
{

    public function makeFolioNumber()
    {
        $config = [
            'table' => $this->table,
            'length' => 6,
            'prefix' => date('y')
        ];
        $ID = IdGenerator::generate($config);
        $this->setAttribute('id', $ID);
        return $ID;

    }
}
