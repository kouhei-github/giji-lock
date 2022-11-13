<?php

namespace App\Services;

use App\Services\Interfaces\QrCodeServiceInterface;
use chillerlan\QRCode\QRCode;


class QrCodeService implements QrCodeServiceInterface
{
    private QRCode $qrcode;
    public function __construct()
    {
        $this->qrcode = new QRCode();
    }

    /**
     * QRコードを生成する
     * @param string $url
     * @return void
     * @throws \Exception
     */
    public function createQrCode(string $url)
    {
        $isUrl = $this->regUrl($url);
        if(!$isUrl){
            throw new \Exception("正しいURLを入力してください。\n" . $url);
        }
        $imag_path = storage_path();

        $this->qrcode->render($url, $imag_path . "/test_qrcode_sample.png");
    }

    /**
     * 正規表現でURLが正しいか確認する
     * @param string $url
     * @return bool
     */
    private function regUrl(string $url): bool
    {
        $isUrl = true;
        $pattern = '/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i';
        if(!preg_match($pattern, $url)){
           $isUrl = false;
        }
        return $isUrl;
    }
}
