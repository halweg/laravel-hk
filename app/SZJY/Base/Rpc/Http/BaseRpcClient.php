<?php
namespace App\SZJY\Base\Rpc\Http;
use GuzzleHttp\Client as HttpRequest;

class BaseRpcClient {
    protected $url;
    protected $service;
    protected $RpcConfig = [];

    public function __construct($service)
    {
        if (array_key_exists($service, $this->RpcConfig)) {
            $this->url = $this->RpcConfig[$service];
            $this->service = $service;
        }
    }

    public function __call($action, $arguments)
    {

        $request_client = new HttpRequest();
        $response = $request_client->request('POST',  $this->url."/{$action}", [
            'form_params' => $arguments[0],
            'debug' => true,
            'allow_redirects' => false
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
