<?php

namespace Softpyramid\DateTimePicker;

use Laravel\Nova\Fields\Field;

use Exception;
use DateTimeInterface;

class DateTimePicker extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'date-time-picker';


    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback ?? function ($value) {
                if (! $value instanceof DateTimeInterface) {
                    throw new Exception("DateTime field must cast to 'datetime' in Eloquent model.");
                }

                return $value->format('Y-m-d H:i:s');
            });
    }

    /**
     * Set the date format (Moment.js) that should be used to display the date.
     *
     * @param  string  $format
     * @return $this
     */
    public function format($format)
    {
        return $this->withMeta(['format' => $format]);
    }

    /**
     * @return $this
     */
    public function inline()
    {
        return $this->withMeta(['inline' => 'inline']);
    }


}
