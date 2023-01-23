<?php

namespace App\Filters;

use Illuminate\Http\Request;

class  ApiFilter {

//http://localhost:8000/api/v1/customers?postalCode[gt]=60000-0000
//http://localhost:8000/api/v1/customers?postalCode[gt]=60000-0000&type[eq]=B&state[eq]=delaware


    protected $safeParms = [];

    protected $columnMap = [];

    protected $operatorMap = [];


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