<?php
declare(strict_types=1);

return [
    [
        "name" => "pid",
        "type" => "input",
        "label" => "商户 ID (PID)",
        "value" => "",
        "tip" => "易支付后台提供的商户 ID",
    ],
    [
        "name" => "key",
        "type" => "input",
        "label" => "商户密钥 (KEY)",
        "value" => "",
        "tip" => "易支付后台提供的商户密钥(KEY)",
    ],
    [
        "name" => "url",
        "type" => "input",
        "label" => "支付网关 URL",
        "value" => "https://zpayz.cn/submit.php",
        "tip" => "易支付下单接口地址,通常以 /submit.php 结尾",
    ],
];
