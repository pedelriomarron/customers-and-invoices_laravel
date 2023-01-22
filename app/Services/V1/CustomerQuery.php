<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery{

//http://localhost:8000/api/v1/customers?postalCode[gt]=60000-0000
//http://localhost:8000/api/v1/customers?postalCode[gt]=60000-0000&type[eq]=B&state[eq]=delaware


    protected $safeParms = [
        'name'=>['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'name'=>['eq'],
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


    public function transform(Request $request){

        $eloQuery = [];

        foreach($this->safeParms as $parm => $operators){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column,$this->operatorMap[$operator],$query[$operator]];
                }
            }

        }

        return $eloQuery;
    }




}