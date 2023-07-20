<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter; 

class ShopQuery extends ApiFilter
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
   
    
}
