<?php
declare(strict_types=1);

namespace App\Pay\Epay\Impl;

use App\Entity\PayEntity;
use App\Pay\Base;

class Pay extends Base implements \App\Pay\Pay
{
    public function trade(): PayEntity
    {
        $params = [
            "pid" => (string)$this->config["pid"],
            "type" => $this->code,
            "out_trade_no" => $this->tradeNo,
            "notify_url" => $this->callbackUrl,
            "return_url" => $this->returnUrl,
            "name" => $this->tradeNo,
            "money" => sprintf("%.2f", $this->amount),
            "sign_type" => "MD5",
        ];

        // 易支付标准签名:除空值/sign/sign_type 外按 key 升序拼接 a=b&c=d 后追加 KEY,md5 小写
        $signStr = $this->buildSignStr($params);
        $params["sign"] = md5($signStr . (string)$this->config["key"]);

        $url = rtrim((string)$this->config["url"], "?") . "?" . http_build_query($params);

        $this->log("trade redirect url => " . $url);

        $entity = new PayEntity();
        $entity->setType(\App\Pay\Pay::TYPE_REDIRECT);
        $entity->setUrl($url);
        return $entity;
    }

    private function buildSignStr(array $params): string
    {
        unset($params["sign"], $params["sign_type"]);
        ksort($params);
        $arr = [];
        foreach ($params as $k => $v) {
            if ($v === "" || $v === null) continue;
            $arr[] = $k . "=" . $v;
        }
        return implode("&", $arr);
    }
}
