<?php

/**
 * Define function format Price.
 *
 * @param $price integer | double
 * @param $currency string
 *
 * @return string
 */
if (!function_exists('formatPrice')) {
    function formatPrice($price, $currency = 'đ')
    {
        return number_format($price) . $currency;
    }
}

/**
 * Get Quantity in Cart.
 *
 * @param array $carts
 * @param integer $productId
 *
 * @return string
 */
if (!function_exists('getQuantityInCart')) {
    function getQuantityInCart($carts, $productId)
    {
        return null;
    }
}

