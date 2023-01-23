<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomersFilter extends ApiFilter {

//http://localhost:8000/api/v1/customers?postalCode[gt]=60000-0000
//http://localhost:8000/api/v1/customers?postalCode[gt]=60000-0000&type[eq]=B&state[eq]=delaware


    protected $safeParms = [
        'name'=>['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'state'=>['eq'],
        'postalCode'=>['eq',"gt","lt"]
    ];

    protected $columnMap = [
        'postalCode'=> 'postal_code'
    ];

    protected $operatorMap = [
        "eq"=>"=",
        "lt"=>"<",
        "lte"=>"<=",
        "gt"=>">",
        "gte"=>">=",
    ];


  


}