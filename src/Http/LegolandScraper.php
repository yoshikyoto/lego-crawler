<?php

namespace LegolandScraper\Http;

class LegolandScraper {

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://creator.zohopublic.com',
            'cookies' => true,
        ]);

    }

    /**
     * 待ち時間取得に必要なCookieを取得します
     * @return GuzzleHttp\Psr7\Response
     */
    public function getCookie() {
        $path = '/legolandjapan/waiting-time/view-embed/htmlview/tqRfOTn4AjD9PPYhkP6S2Fw75XqKgJwz8OmtCxkHZCY07Ss0AG6bT8BzAhwbhPyUt6PAAy7S5DPZCJRnSFbAte44CzUVztbaSzpw?';
        return $this->client->get($path);
    }

    /**
     * 取得したCookieを使って待ち時間の情報を取得します
     * @return array 待ち時間APIで取得したjson
     */
    public function getWaitingTime() {
        $path = '/legolandjapan/waiting-time/report/view?zc_Header=false&zc_Footer=false&zc_SecHeader=false&zc_AddRec=false&zc_EditRec=false&zc_DelRec=false&zc_DuplRec=false&zc_EditBulkRec=false&zc_RecLimit=false&zc_SaveRec=false&privateLink=C874nYVOXUZQ4pXefa0gkJkBA9bN7yubKyRPOZCKUHSRrPvg88AzHKmwPfmfYAqJqkwrsTm7DCa9v5JtPPphZ0bmy4RJywAbwKtD&zc_LoadIn=html';
        $response = $this->client->get($path);
        return json_decode($response->getBody()->getContents(), true);
    }
}
