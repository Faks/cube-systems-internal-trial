<?php

namespace App\Soap\Services;

use Artisaninweb\SoapWrapper\Exceptions\ServiceAlreadyExists;
use Artisaninweb\SoapWrapper\SoapWrapper;

class SoapService
{
    /**
     * @var SoapWrapper
     */
    public $soapWrapper;

    /**
     * @var string
     */
    public $injectionSuffix = 'Filter';

    /**
     * SoapService constructor.
     * @param $wrapper $soapWrapper
     * @throws ServiceAlreadyExists
     */
    public function __construct(SoapWrapper $wrapper)
    {
        $this->soapWrapper = $wrapper;
        $this->connect();
    }

    /**
     * Init Config
     *
     * @throws ServiceAlreadyExists
     */
    public function connect(): void
    {
        $this->soapWrapper->add($this->injectionSuffix, function ($service) {
            $service
                ->wsdl(env('SOAP_URL', false))
                ->trace(true);
        });
    }
}
