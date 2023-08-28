<?php

namespace app\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class ServicesFilter extends ApiFilter {
    protected $allowedParams = [
        'customerId' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'billedDate' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'paidDate' => ['eq'],
        'cost' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'status' => ['eq', 'ne']
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];

    protected $operatorMap = [
      'eq' => '=',
      'ne' => '!=',
      'lt' => '<',
      'lte' => '<=',
      'gt' => '>',
      'gte' => '>='
    ];
}
