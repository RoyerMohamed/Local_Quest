<?php

namespace App\Filter\V1;

use Illuminate\Http\Request;

class ShopQuery
{

    // filter option for each columns
    protected  $allowedPrams = [
        'shopTitle'             => ['eq'],
        'description'           => ['eq'],
        'website'               => ['eq'],
        'phoneNumber'           => ['eq'],
        'zipCode'               => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'city'                  => ['eq'],
        'rating'                => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'longitude'             => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'latitude'              => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'shopStatus'            => ['eq', 'gt', 'lt', 'gte', 'lte'],
    ];

    // reconvert columns names to origin 
    protected $columnMap = [
        'zipCode' => 'zip_code',
        'phoneNumber' => 'phone_number',
        'shopTitle' => 'shop_title',
        'shopStatus' => 'shop_status',
    ];

    // asigne nams to operators 
    protected $toto = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='
    ];

    //transforming the query params to eloquen

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->allowedPrams as $params => $operators) {
            var_dump($params); 

          /*   $query = $request->query($request->query($params));
            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$params] ?? $params; 
            
            foreach ($operators as $operator) {
                
                if(isset($query['zipCode'])){
                    //$eloQuery = [$column , $this->toto[$operator], $query[$operator]];
                }
            } */
        }

        return $eloQuery;
    }
}