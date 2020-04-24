<?php

namespace betadog\yii1;

/**
 * Usage:
 *
 * ['name', 'betadog\\yii1\\MultiFilter', 'filters' => ['trim', 'strtolower',]],
 *
 */
class MultiFilter extends \CValidator
{
    /** @var array */
    protected $filters;

    public function setFilters($value)
    {
        $this->filters = (array)$value;
    }

    protected function validateAttribute($object, $attribute)
    {
        foreach ($this->filters as $filter) {
            if (!is_callable($filter)) {
                throw new \CException(\Yii::t('yii', 'The "filter" property must be specified with a valid callback.'));
            }

            $object->$attribute = call_user_func_array($filter, [$object->$attribute]);
        }
    }
}