<?php
namespace app\modules\weixin\controllers;

use app\common\components\BaseWebController;
use app\common\services\UrlService;
use app\common\services\weixin\RequestService;

class MenuController extends BaseWebController {

	public function actionSet(){
		$menu  = [
			"button" => [
				[

					"name"=> "约车",
                    "sub_button"=>[
                        [
                            "name" => "定制约车",
                            "type" => "view",
                            "url" => UrlService::buildMUrl("/product/index")
                        ],
                        [
                            "name" => "团体包车",
                            "type" => "view",
                            "url" => UrlService::buildMUrl("/product/info?id=99999")
                        ]
                    ],

				],
				[
					"name" => "我的",
					"type" => "view",
					"url" => UrlService::buildMUrl("/user/index")
				],
                [
                    "name" => "车站",
                    "sub_button"=>[
                        [
                            "name" => "班车时刻表",
                            "type" => "view",
                            "url" => "http://www.pyctqcz.com/index.php/%e7%8f%ad%e8%bd%a6%e6%97%b6%e5%88%bb%e8%a1%a8/"
                        ],
                        [
                            "name" => "公交时刻表",
                            "type" => "view",
                            "url" => "http://www.pyctqcz.com/index.php/%e5%85%ac%e4%ba%a4%e6%97%b6%e5%88%bb%e8%a1%a8/"
                        ]
                    ],
                ]
			]
		];
		$config = \Yii::$app->params['weixin'];
		RequestService::setConfig( $config['appid'],$config['token'],$config['sk'] );
		$access_token = RequestService::getAccessToken();
		if( $access_token ){
			$url = "menu/create?access_token={$access_token}";
			$ret = RequestService::send( $url,json_encode($menu,JSON_UNESCAPED_UNICODE), 'POST' );
			var_dump( $ret );
		}
	}
}
