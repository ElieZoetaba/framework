<?php

declare(strict_types=1);

/**
 * Contains the CartItem test class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-11-13
 *
 */

namespace Vanilo\Checkout\Tests\Example;

use Vanilo\Contracts\Buyable;
use Vanilo\Contracts\CheckoutSubjectItem;

class CartItem implements CheckoutSubjectItem
{
    /** @var  Buyable */
    protected $product;

    /** @var  integer */
    protected $qty;

    public function __construct(Buyable $product, $qty)
    {
        $this->product = $product;
        $this->qty = $qty;
    }

    public function increaseQuantityWith($increment)
    {
        $this->qty += $increment;
    }

    /**
     * @inheritDoc
     */
    public function getBuyable(): Buyable
    {
        return $this->product;
    }

    /**
     * @inheritDoc
     */
    public function getQuantity(): int
    {
        return $this->qty;
    }

    /**
     * @inheritDoc
     */
    public function total(): float
    {
        return $this->product->getPrice() * $this->qty;
    }
}
