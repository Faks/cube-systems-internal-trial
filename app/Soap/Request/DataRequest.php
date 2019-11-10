<?php

namespace App\Soap\Request;

use App\Soap\Services\SoapService;

class DataRequest extends SoapService
{
    /**
     * Collect Soap function data
     *
     * @param string $function
     * @return mixed
     */
    public function get($function = 'GetSuppliersList')
    {
        $data = $this->soapWrapper->call($this->injectionSuffix . '.' . $function, [[
            'MMIdentification' => [
                'username' => env('MMIdentification_USERNAME', false),
                'password' => env('MMIdentification_PASSWORD', false),
                'supplierEIC' => env('MMIdentification_SUPPLIER_EIC', false),
                'messageId' => env('MMIdentification_MESSAGE_ID', false),
            ]
        ]]);

        return $data->suppliersList->SuppliersEntry;
    }
}
