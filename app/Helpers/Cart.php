<?php

/**
 * @param $cartContent
 * @param $isPurchase
 * @return array
 */
function get_cart_content($cartContent, $isPurchase) {
    $content = collect([]);
    $total = 0;
    $count = 0;

    foreach ($cartContent as $item) {
        if($isPurchase && $item->qty == 1 || !$isPurchase && $item->qty > 1) {
            $content->push($item);
            $total += $item->qty * $item->price;
            $count += $item->qty;
        }
    }

    return [
        "content" => $content,
        "total" => $total,
        "count" => $count,
    ];
}
