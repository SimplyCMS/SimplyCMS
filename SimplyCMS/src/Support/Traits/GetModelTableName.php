<?php

namespace SimplyCMS\Support\Traits;

trait GetModelTableName
{
    /**
     * Return the table name defined in the model
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }
}
