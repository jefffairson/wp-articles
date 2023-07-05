<?php

namespace Jefffairson\WPArticles\Tools;

use Illuminate\Support\Collection;

class AcfFields
{
    private $fields;

    /**
     * __construct
     */
    public function __construct(Collection $fields)
    {
        $this->fields = $fields->toArray();
    }

    /**
     * __get
     */
    public function __get($value): mixed
    {
        if (isset($this->fields[$value])) {
            /*if (is_array($this->fields[$value])) {
                if (in_array($value, $this->toTransform)) {
                    $method = str()->camel($value);
                    return $this->$method($this->fields[$value]);
                }
                if (is_array($this->fields[$value])) {
                    return collect($this->fields[$value]);
                }
                return (object) $this->fields[$value];
            }*/
            return $this->fields[$value];
        }
        return false;
    }
}
