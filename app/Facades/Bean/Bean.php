<?php

namespace App\Facades\Bean;

use GuzzleHttp\Client as HttpClient;
use App\Models\Shop\Project\Project;
use GuzzleHttp\Exception\RequestException;
use Predis\Client as RedisClient;

/**
 * Class Bean
 * @package App\Facades\Bean
 */
class Bean
{
    protected $unionid, $user, $redisServer;

    public function __construct()
    {
        $this->user = session('med_user');
        $this->unionid = $this->user['unionid'];
    }

    /**
     * @param $projectId
     * @param $point
     * @return bool
     * @throws \Exception
     */
    public function exchangePoint($projectId, $point)
    {
        $project = Project::find($projectId);
        self::validatePoint($project->redis_key, $this->unionid, $point);

        $client = new HttpClient();
        $params = [
            'userId' => $this->unionid,
            'point' => $point,
            'timestamp' => self::getMsec()
        ];
        $params['signature'] = $this->genSignature($params, $project->api_private_key);
        try {
            $response = $client->request('POST', $project->api_url_exchange_point, [
                'json' => $params
            ]);
            $responseJson = json_decode($response->getBody()->getContents());
            if ($responseJson->errCode == 200) {
                return true;
            } else {
                \Log::error('api[point_record]', ['request' => $params, 'response' => $responseJson]);
                throw new \Exception($responseJson->reason);
            }
        } catch (RequestException $e) {
            \Log::error('api[point_record]', ['request' => $params, 'response' => $responseJson]);
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $params
     * @param $privateKey
     * @return string
     */
    private function genSignature($params, $privateKey)
    {
        if (!isset($params['timestamp']) || empty($params['timestamp'])) {
            $params['timestamp'] = time() * 1000;
        }
        ksort($params);
        $signature_string = '';
        foreach ($params as $key => $val) {
            $signature_string .= $key . ':' . json_encode($val, JSON_UNESCAPED_UNICODE) . ',';
        }
        $signature_string .= 'privateKey:' . $privateKey;
        return sha1($signature_string);
    }

    /**
     * @param $projectKey
     * @param $unionId
     * @param $point
     * @return bool
     * @throws \Exception
     */
    public static function validatePoint($projectKey, $unionId, $point)
    {
        $redisPoint = self::getPointByUnionId($projectKey, $unionId);
        if ($redisPoint < $point) {
            throw new \Exception('积分不足！');
        } else {
            return true;
        }
    }

    /**
     * @param $projectKey
     * @param $unionId
     * @return int|string
     */
    public static function getPointByUnionId($projectKey, $unionId)
    {
        try {
            return (new RedisClient(config('database.redis.default')))->hget($projectKey, $unionId);
        } catch (\Exception $e) {
            // TODO log
        }
        return 0;
    }

    /**
     * 获取当前毫秒数
     * @return string
     */
    public function getMsec()
    {
        list($msec, $sec) = explode(' ', microtime());
        return sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }
}