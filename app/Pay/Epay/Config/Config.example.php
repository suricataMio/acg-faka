<?php
declare(strict_types=1);

/**
 * Epay (易支付 / Z-Pay) 凭据模板
 *
 * 复制本文件为同目录的 Config.php, 并填入真实值。
 * 真实的 Config.php 已被 .gitignore 排除, 不会进入版本库。
 *
 * - pid : 商户 ID (PID), 在网关后台获取
 * - key : 商户密钥, 用于签名 / 验签, 切勿泄露
 * - url : 网关下单地址, 一般是 https://<host>/submit.php
 */

return [
    "pid" => "",
    "key" => "",
    "url" => "https://zpayz.cn/submit.php",
];
