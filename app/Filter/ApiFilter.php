<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class ApiFilter  
{

    // filter option for each columns
    protected  $allowedPrams = [];

    // reconvert columns names to origin 
    protected $columnMap = [];

    protected $operators = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='
    ];
    

    public static function applyFilters(Builder $query, array $filters): Builder 
    {
        $shopQuery = new self();
        
        foreach ($filters as $param => $value) {
            if ($shopQuery->isParamAllowed($param)) {  
                $column = $shopQuery->getColumn($param);
                $operator = $shopQuery->getOperator($param);

                if (is_array($value)) {
                    foreach ($value as $op => $val) {
                        if ($shopQuery->isOperatorAllowed($param, $op)) {
                            $query->where($column, $shopQuery->operators[$op], $val);
                        }
                    }
                } else {
                    $query->where($column, $operator, $value);
                }
            }
        }

        return $query;
    }

    protected function isParamAllowed(string $param): bool
    {
        return array_key_exists($param, $this->allowedPrams);
    }

    protected function getColumn(string $param): string
    {
        return $this->columnMap[$param] ?? $param;
    }

    protected function getOperator(string $param): string
    {
        return Arr::first($this->allowedPrams[$param]);
    }

    protected function isOperatorAllowed(string $param, string $operator): bool
    {
        return in_array($operator, $this->allowedPrams[$param]);
    }
}
