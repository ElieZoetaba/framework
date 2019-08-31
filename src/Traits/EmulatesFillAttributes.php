<?php
/**
 * Contains the EmulatesFillAttributes class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-12-11
 *
 */

namespace Vanilo\Checkout\Traits;

use Illuminate\Support\Str;

trait EmulatesFillAttributes
{
    protected function fillAttributes($target, array $attributes)
    {
        if (!is_object($target)) {
            return false;
        }

        foreach ($attributes as $key => $value) {
            $setter = 'set' . Str::studly($key);

            if (method_exists($target, $setter)) {
                $target->{$setter}($value);
            } else {
                $target->{$key} = $value;
            }
        }
    }
}
