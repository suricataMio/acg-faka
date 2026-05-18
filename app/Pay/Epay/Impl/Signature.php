<?php
declare(strict_types=1);

namespace App\Pay\Epay\Impl;

class Signature implements \App\Pay\Signature
{
    public function verification(array $data, array $config): bool
    {
        if (!isset($data["sign"])) {
            return false;
        }
        $sign = (string)$data["sign"];
        $params = $data;
        unset($params["sign"], $params["sign_type"]);
        ksort($params);

        $arr = [];
        foreach ($params as $k => $v) {
            if ($v === "" || $v === null) continue;
            if (is_array($v)) continue;
            $arr[] = $k . "=" . $v;
        }
        $signStr = implode("&", $arr);
        $computed = md5($signStr . (string)$config["key"]);
        return hash_equals($computed, $sign);
    }
}
