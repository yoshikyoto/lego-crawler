<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LegolandScraper\Http\LegolandScraper;
use LegolandScraper\File\File;

echo '待ち時間取得' . PHP_EOL;
$scraper = new LegolandScraper();
$scraper->getCookie();
// json形式で返ってくるのでその中のHTML要素を取得
$json = $scraper->getWaitingTime();
$html = $json['HTML'];

// ファイルに保存
$date = date('YmdHis');
$path = __DIR__ . '../data/' . $date;
file_put_contents($path, $html);
