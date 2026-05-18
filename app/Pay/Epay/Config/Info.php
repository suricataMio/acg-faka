<?php
declare(strict_types=1);

use App\Consts\Pay;

return [
    "name" => "易支付 / Z-Pay",
    "description" => "通用易支付驱动(兼容 zpayz.cn 等)",
    "version" => "1.0.0",
    "author" => "admin",
    "icon" => "/assets/user/images/cash/alipay.png",
    "callback" => [
        Pay::IS_SIGN => 1,
        Pay::IS_STATUS => 1,
        Pay::FIELD_STATUS_KEY => "trade_status",
        Pay::FIELD_STATUS_VALUE => "TRADE_SUCCESS",
        Pay::FIELD_ORDER_KEY => "out_trade_no",
        Pay::FIELD_AMOUNT_KEY => "money",
        Pay::FIELD_RESPONSE => "success",
    ],
];
