<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter {

//http://localhost:8000/api/v1/customers?postalCode[gt]=60000-0000
//http://localhost:8000/api/v1/customers?postalCode[gt]=60000-0000&type[eq]=B&state[eq]=delaware


    protected $safeParms = [
        'customerId'=>['eq'],
        'amount'=>['eq','lt','gt','gte','lte'],
        'status'=>['eq','ne'],
        'billedDate'=>['eq','lt','gt','gte','lte'],
        'paidDate'=>['eq','lt','gt','gte','lte'],
    ];

    protected $columnMap = [
        'customerId'=> 'customer_id',
        "billedDate"=>"billed_date",
        "paidDate"=>"paid_date"
    ];

    protected $operatorMap = [
        "eq"=>"=",
        "lt"=>"<",
        "lte"=>"<=",
        "gt"=>">",
        "gte"=>">=",
        "ne"=>"!="
    ];



}