<?php

require_once './HardWareGoods.php';
require_once './SoftWareGoods.php';
require_once './Services.php';


try {
    echo "<pre>";
    $service = new Services('Change oil', 30, 'Once');

    print_r($service);

    $softWareGoods = new SoftWareGoods('LumaFusion', 29.99, '2022-01-01', 'IOS');

    print_r($softWareGoods);


    $hardWareGoods = new HardWareGoods('IPhone16', 900, '2024-12-12', ['glass', 'aluminium'], true);

    print_r($hardWareGoods);

} catch (Exception $exception) {
    echo $exception->getMessage();
}