<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class LaraRecordType extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('record_type', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Provisioning Center' => 'Provisioning Center',
            'Processor' => 'Processor',
            'Class A Grower' => 'Class A Grower',
            'Class B Grower' => 'Class B Grower',
            'Class C Grower' => 'Class C Grower',
            'Secure Transporter' => 'Secure Transporter',
            'Safety Compliance' => 'Safety Compliance',


        ];
    }
}
