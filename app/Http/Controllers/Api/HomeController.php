<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Soap\Models\Soap;
use App\Soap\Request\DataRequest;
use App\Soap\Services\SoapService;

class HomeController extends Controller
{
    /**
     * @var SoapService
     */
    protected $request;

    /**
     * HomeController constructor.
     * @param DataRequest $dataRequest
     */
    public function __construct(DataRequest $dataRequest)
    {
        $this->request = $dataRequest;
    }

    /**
     * @return mixed
     */
    public function list()
    {
        return $this->request->get();
    }

    /**
     * @param mixed $q
     * @return mixed
     */
    public function filter($q)
    {
        $getDataSuppliersList = $this->request->get();

        $filter = false;

        $collectSupplierNames = Soap::filter($getDataSuppliersList, 'supplierName', 'like', $q);
        $collectRegistrationNumbers = Soap::filter($getDataSuppliersList, 'registrationNumber', '=', $q);

        if (count($collectSupplierNames) >= 1) {
            $filter = $collectSupplierNames;
        }

        if (count($collectRegistrationNumbers) >= 1) {
            $filter = $collectRegistrationNumbers;
        }

        return $filter;
    }
}
