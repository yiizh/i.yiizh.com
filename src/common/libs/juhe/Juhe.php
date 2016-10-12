<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace common\libs\juhe;


use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\httpclient\Client;
use yii\log\Logger;

class Juhe extends Component
{
    public $appKey;
    public $baseUrl = 'http://apis.juhe.cn';

    private $_client;

    const REASON_SUCCESS = '成功的返回';

    /**
     * @param string $url
     * @param array $params
     * @return bool|string
     */
    public function httpGet($url, $params = [])
    {
        if(substr($url,0,4) == 'http'){
            $baseUrl = false;
        }else{
            $baseUrl  = $this->baseUrl;
        }
        $client = $this->getClient($baseUrl);
        $response = $client->get($url, $params)
            ->send();

        if ($response->isOk) {
            return Json::decode($response->content);
        } else {
            \Yii::getLogger()->log('调用接口错误 :' . $response->content, Logger::LEVEL_ERROR);
            return false;
        }
    }

    /**
     * @param bool|string $baseUrl
     * @return Client
     */
    protected function getClient($baseUrl = false)
    {
        if ($this->_client == null) {
            $this->_client = new Client();
            if ($baseUrl) {
                $this->_client->baseUrl = $baseUrl;
            }
        }

        return $this->_client;
    }

    /**
     * @return array
     *
     * [
     *     [
     *
     *     ]
     * ]
     */
    public function getNews()
    {
        $resp = $this->httpGet('http://v.juhe.cn/toutiao/index', ['type' => 'top', 'key' => $this->appKey]);

        if (ArrayHelper::getValue($resp, 'reason') == self::REASON_SUCCESS) {
            return ArrayHelper::getValue($resp, 'result.data');
        } else {
            return [];
        }
    }

}