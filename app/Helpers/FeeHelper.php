<?php

namespace lazyworker\Helpers;

use \lazyworker\Product;
use \lazyworker\PurchaseOrderProduct;

class FeeHelper
{
    public static function calculateOrderPrice(PurchaseOrderProduct $purchaseOrderProduct, $quantity = 0)
    {
        if ($purchaseOrderProduct->product->is_multi_item) {
            return self::calculateProductPrice($purchaseOrderProduct->product, $quantity);
        } else {
            $items = array();
            foreach ($purchaseOrderProduct->purchaseOrderProductItems as $purchaseOrderProductItem) {
                $productItem = $purchaseOrderProductItem->productItem;
                for ($i = 0;$i < $purchaseOrderProductItem->quantity;$i ++) {
                    $items[] = [
                        'id' => $productItem->id,
                        'price' => $productItem->special_price
                    ];
                }
            }

            return self::calculateProductItemPrice($purchaseOrderProduct->product, $items);
        }
    }

    public static function calculateProductPrice(Product $product, $quantity = 0) {
        $price = 0;

        while ($quantity > 0) {
            $productPrograms = $product->hasMany(\lazyworker\ProductProgram::class)->where('quantity', $quantity)->orderBy('quantity', 'DESC')->get();

            $maxQuantity = 0;
            $programQuantities = [];
            for ($i = 0;$i < count($productPrograms);$i ++) {
                $programQuantities[] = $productPrograms[$i]->quantity;

                if ($productPrograms[$i]->quantity > $maxQuantity) {
                    $maxQuantity = $productPrograms[$i]->quantity;
                }
            }

            $remainQuantity = $quantity;
            for ($i = 0;$i < count($programQuantities);$i ++) {
                $productProgram = $productPrograms[$i];
                $remainQuantity = $quantity - $productProgram->quantity;
                $pureRemain = self::calculatePureValue($remainQuantity);
                if (count(array_intersect($pureRemain, $programQuantities)) > 0 || $remainQuantity <= 1 || $remainQuantity >= $maxQuantity) {
                    $price +=  $productProgram->price;
                    break;
                }
            }

            if ($quantity == $remainQuantity) {
                $price += $product->special_price * $quantity;
                $quantity = 0;
            } else {
                $quantity = $remainQuantity;
            }
        }
        return $price;
    }

    public static function calculateProductItemPrice(Product $product, $productItems) {
        $price = 0;
        $quantity = count($productItems);

        while ($quantity > 0) {
            $productPrograms = $product->hasMany(\lazyworker\ProductProgram::class)->where('quantity', $quantity)->orderBy('quantity', 'DESC')->get();

            $maxQuantity = 0;
            $programQuantities = [];
            for ($i = 0;$i < count($productPrograms);$i ++) {
                $programQuantities[] = $productPrograms[$i]->quantity;

                if (intval($productPrograms[$i]->quantity) > $maxQuantity) {
                    $maxQuantity = intval($productPrograms[$i]->quantity);
                }
            }

            $remainQuantity = $quantity;
            for ($i = 0;$i < count($programQuantities);$i ++) {
                $productProgram = $productPrograms[$i];
                $remainQuantity = $quantity - $productProgram->quantity;
                $pureRemain = self::calculatePureValue($remainQuantity);
                if (count(array_intersect($pureRemain, $programQuantities)) > 0 || $remainQuantity <= 1 || $remainQuantity >= $maxQuantity) {
                    if (isset($productProgram->price)) {
                        $price += $productProgram->price;
                    }

                    for ($i = 0;$i < $productProgram->quantity;$i ++) {
                        $currentItem = null;
                        $currentKey = null;
                        foreach ($productItems as $itemKey => $item) {
                            if (!$currentItem || $item['price'] > $currentItem['price']) {
                                $currentItem = $item;
                                $currentKey = $itemKey;
                            }
                        }

                        if (isset($currentItem)) {
                            unset($productItems[$currentKey]);
                        }

                        if (!isset($productProgram->price)) {
                            $price += $currentItem['price'];
                        }
                    }
                    break;
                }
            }

            if ($quantity == $remainQuantity) {
                foreach ($productItems as $itemKey => $item) {
                    $price += $item['price'];
                }
                $quantity = 0;
            } else {
                $quantity = $remainQuantity;
            }
        }
        return $price;
    }

    private static function calculatePureValue($input) {
        $output = [1];
        for ($i = 2; $i <= $input; $i++) {
            while ($input <> $i) {
                if ($input % $i == 0) {
                    $output[] = $i;
                    $input /= $i;
                } else {
                    break;
                }
            }
        }
        $output[] = $input;
        return $output;
    }
}