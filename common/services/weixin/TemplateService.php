<?php

namespace app\common\services\weixin;

use app\common\services\BaseService;
use app\common\services\DataHelper;
use app\common\services\UrlService;
use app\models\book\Baoche;
use app\models\book\Book;
use app\models\member\Member;
use app\models\member\OauthMemberBind;
use \app\models\pay\PayOrder;
use app\models\pay\PayOrderItem;
use Yii;


class TemplateService extends  BaseService
{
    /**
     * 支付完成提醒
     */
    public static function payNotice( $pay_order_id ){

        $pay_order_info =PayOrder::findOne( $pay_order_id );
        $member_info = Member::findOne($pay_order_info['member_id']);
        $pay_order_item_info=PayOrderItem::findOne($pay_order_info['id']);
        $book_info = Book::findOne($pay_order_item_info['target_id']);
        if( !$pay_order_info ){
            return false;
        }

		$config = \Yii::$app->params['weixin'];
		RequestService::setConfig( $config['appid'],$config['token'],$config['sk'] );

        $open_id = self::getOpenId( $pay_order_info['member_id'] );
        if(!$open_id){
            return false;
        }

//		$template_id = "bZ2eW05hftOxirpNqBa4xMpLV5rvOEgjppvc1sjsjL4";
//        改为预订
        $template_id = "6WSfn7GE9HxaauQcJDlB-0GSwQcX3CLBzEE_9vEfzec";
        $pay_money = $pay_order_info["pay_price"];
        $xiangqing_info = "";
        if($pay_order_item_info['quantity']>9){
            $xiangqing_info="如有疑问，请拨打87872024或13964029277。请核对您的电话：".$member_info['mobile']."。我们将尽快安排专员与您联系";
        }else{
            $xiangqing_info="如有疑问，请拨打87878758或15698019026。请核对您的电话：".$member_info['mobile']."。我们将尽快安排专员与您联系";
        }
        $data = [
            "first" => [
                "value" => $member_info['nickname']."您已成功预订出行服务",
                "color" => "#173177"
            ],
            "type" =>[
                "value" => "出行服务公司",
                "color" => "#173177"
            ],
            "name" =>[
                "value" => "山东交运平阴公司",
                "color" => "#173177"
            ],
            "productType" =>[
                "value" => "出行服务",
                "color" => "#173177"
            ],
            "serviceName" =>[
                "value" => $book_info['name']."。共计".$pay_order_item_info['quantity']."人。",
                "color" => "#173177"
            ],
            "time" =>[
                "value" => $pay_order_info['chuxingtime'],
                "color" => "#173177"
            ],
            "remark" => [
                "value" => $xiangqing_info,
                "color" => "#173177"
            ]
        ];

        return self::send($open_id,$template_id,UrlService::buildMUrl( "/user/order" ),$data);
    }

    public static function payNoticeMaster( $pay_order_id ){

        $pay_order_info =PayOrder::findOne( $pay_order_id );
        $member_info = Member::findOne($pay_order_info['member_id']);
        $pay_order_item_info=PayOrderItem::findOne($pay_order_info['id']);
        $book_info = Book::findOne($pay_order_item_info['target_id']);
        if( !$pay_order_info ){
            return false;
        }

        $config = \Yii::$app->params['weixin'];
        RequestService::setConfig( $config['appid'],$config['token'],$config['sk'] );

        $open_id = 'oeaD856j_Nt-gzR5D6Ry1yWgVJ6Y';
        if(!$open_id||$pay_order_item_info['quantity']>9){
            return false;
        }

        $template_id = "bZ2eW05hftOxirpNqBa4xMpLV5rvOEgjppvc1sjsjL4";

        $data = [
            "first" => [
                "value" => "有客户下单",
                "color" => "#173177"
            ],
            "keyword1" =>[
                "value" => $member_info['nickname'].$member_info['mobile'],
                "color" => "#173177"
            ],
            "keyword2" =>[
                "value" => $book_info['name'],
                "color" => "#173177"
            ],
            "keyword3" =>[
                "value" => $pay_order_item_info['quantity'],
                "color" => "#173177"
            ],
            "keyword4" =>[
                "value" => $pay_order_info['chuxingtime'],
                "color" => "#173177"
            ],
            "remark" => [
                "value" => "请尽快与出行人联系。"."联系电话为：".$member_info['mobile'],
                "color" => "#173177"
            ]
        ];

        return self::send($open_id,$template_id,UrlService::buildMUrl( "/user/order" ),$data);
    }
//向管理员发送消息
    public static function payNoticeMasterWu( $pay_order_id ){

        $pay_order_info =PayOrder::findOne( $pay_order_id );
        $member_info = Member::findOne($pay_order_info['member_id']);
        $pay_order_item_info=PayOrderItem::findOne($pay_order_info['id']);
        $book_info = Book::findOne($pay_order_item_info['target_id']);
        if( !$pay_order_info ){
            return false;
        }

        $config = \Yii::$app->params['weixin'];
        RequestService::setConfig( $config['appid'],$config['token'],$config['sk'] );
        $open_id='';
        if($pay_order_item_info['quantity']>9){
            $open_id = 'oeaD8511utUZGqK140Mc3Kalj2rQ';
        }else{

            $open_id = 'oeaD85wGc6jW6cGtQqzesYOcaYD4';
        }
        if(!$open_id){
            return false;
        }

        $template_id = "bZ2eW05hftOxirpNqBa4xMpLV5rvOEgjppvc1sjsjL4";

        $data = [
            "first" => [
                "value" => "有客户下单",
                "color" => "#173177"
            ],
            "keyword1" =>[
                "value" => $member_info['nickname'].$member_info['mobile'],
                "color" => "#173177"
            ],
            "keyword2" =>[
                "value" => $book_info['name'],
                "color" => "#173177"
            ],
            "keyword3" =>[
                "value" => $pay_order_item_info['quantity'],
                "color" => "#173177"
            ],
            "keyword4" =>[
                "value" => $pay_order_info['chuxingtime'],
                "color" => "#173177"
            ],
            "remark" => [
                "value" => "请尽快与出行人联系。"."联系电话为：".$member_info['mobile'],
                "color" => "#173177"
            ]
        ];

        return self::send($open_id,$template_id,UrlService::buildMUrl( "/user/order" ),$data);
    }
//包车成功消息提醒
    public static function baocheNotice( $baoche_id ){

        $baoche_info = Baoche::findOne($baoche_id);
        if( !$baoche_info ){
            return false;
        }

        $config = \Yii::$app->params['weixin'];
        RequestService::setConfig( $config['appid'],$config['token'],$config['sk'] );

        $open_id = self::getOpenId( $baoche_info['member_id'] );
        if(!$open_id){
            return false;
        }

        $template_id = "unV0vSiQ95_QNMQFmeVG8YGh3mdhYJ6nuXy8FBnLczI";


        $data = [
            "first" => [
                "value" => "您好",
                "color" => "#173177"
            ],
            "keyword1" =>[
                "value" => "团体包车业务",
                "color" => "#173177"
            ],
            "keyword2" =>[
                "value" => $baoche_info['chuxingtime'],
                "color" => "#173177"
            ],
            "keyword3" =>[
                "value" => "成人:".$baoche_info['chengren']."儿童:".$baoche_info['ertong'],
                "color" => "#173177"
            ],
            "keyword4" =>[
                "value" => $baoche_info['fromaddress'],
                "color" => "#173177"
            ],
            "keyword5" =>[
                "value" => $baoche_info['toaddress'],
                "color" => "#173177"
            ],
            "remark" => [
                "value" => "请核对您的信息，如有错误请与87883369联系。",
                "color" => "#173177"
            ]
        ];

        return self::send($open_id,$template_id,UrlService::buildMUrl( "/user/order" ),$data);
    }

    //包车成功向管理员消息提醒
    public static function baocheNoticeMaster( $baoche_id ){

        $baoche_info = Baoche::findOne($baoche_id);
        if( !$baoche_info ){
            return false;
        }

        $config = \Yii::$app->params['weixin'];
        RequestService::setConfig( $config['appid'],$config['token'],$config['sk'] );

        $open_id = 'oeaD8558td1ycsI5MUx9NmTsNQNA';
        if(!$open_id){
            return false;
        }

        $template_id = "unV0vSiQ95_QNMQFmeVG8YGh3mdhYJ6nuXy8FBnLczI";


        $data = [
            "first" => [
                "value" => $baoche_info['nickname']."包车",
                "color" => "#173177"
            ],
            "keyword1" =>[
                "value" => "团体包车业务",
                "color" => "#173177"
            ],
            "keyword2" =>[
                "value" => $baoche_info['chuxingtime'],
                "color" => "#173177"
            ],
            "keyword3" =>[
                "value" => "成人:".$baoche_info['chengren']."儿童:".$baoche_info['ertong'],
                "color" => "#173177"
            ],
            "keyword4" =>[
                "value" => $baoche_info['fromaddress'],
                "color" => "#173177"
            ],
            "keyword5" =>[
                "value" => $baoche_info['toaddress'],
                "color" => "#173177"
            ],
            "remark" => [
                "value" => "有人包车，联系电话：".$baoche_info['mobile'],
                "color" => "#173177"
            ]
        ];

        return self::send($open_id,$template_id,UrlService::buildMUrl( "/user/order" ),$data);
    }
	/**
	 * 发货通知提醒
	 */
	public static function expressNotice( $pay_order_id ){

		$pay_order_info = PayOrder::findOne( $pay_order_id );
		if( !$pay_order_info ){
			return self::_err( "订单不存在~~" );
		}

		$pay_order_items = PayOrderItem::find()->where([ 'pay_order_id' => $pay_order_id ])->all();
		if( !$pay_order_items ){
			return self::_err( "订单不存在~~" );
		}

		$config = \Yii::$app->params['weixin'];
		RequestService::setConfig( $config['appid'],$config['token'],$config['sk'] );

		$open_id = self::getOpenId( $pay_order_info['member_id'] );
		if( !$open_id ){
			return self::_err( "openid 没找到~~" );
		}

		$template_id = "cmFsbU-Bqwm-EVvfLgj2QfQGewp0uAelqgM9HFMa9DE";
		$pay_money = $pay_order_info["pay_price"];

		$book_items = [];
		$book_mapping = DataHelper::getDicByRelateID( $pay_order_items,Book::className(),"target_id","id",[ 'name' ] );
		foreach( $pay_order_items as $_pay_order_item_info ){
			if( !isset( $book_mapping[ $_pay_order_item_info['target_id'] ]) ){
				continue;
			}
			$book_items[] = $book_mapping[ $_pay_order_item_info['target_id'] ]['name'];
		}

		$data = [
			"first" => [
				"value" => "您的订单已经标记发货，请留意查收",
				"color" => "#173177"
			],
			"orderProductPrice" =>[
				"value" => $pay_money,
				"color" => "#173177"
			],
			"orderProductName" =>[
				"value" => implode(",",$book_items),
				"color" => "#173177"
			],
			"orderName" =>[
				"value" => date("Ymd",strtotime( $pay_order_info['created_time'] ) ).$pay_order_info['id'],
				"color" => "#173177"
			],
			"remark" => [
				"value" => "快递信息：".$pay_order_info['express_info'],
				"color" => "#173177"
			]
		];

		return self::send($open_id,$template_id,UrlService::buildMUrl( "/user/order" ),$data);
	}

	/**
	 * 微信绑定通知提醒
	 */
	public static function bindNotice( $member_id ){

		$member_info  = Member::findOne( [ 'id' => $member_id ] );
		if( !$member_info ){
			return false;
		}

		$config = \Yii::$app->params['weixin'];
		RequestService::setConfig( $config['appid'],$config['token'],$config['sk'] );

		$open_id = self::getOpenId( $member_id );
		if(!$open_id){
			return false;
		}

		$template_id = "D9WCDAceA8VrSeUrHEQsw2zbTJOWaLcFX_HsMbbuC_4";

		$data = [
			"first" => [
				"value" => "您好，您已注册并成功绑定微信",
				"color" => "#173177"
			],
			"keyword1" =>[
				"value" => $member_info['nickname'],
				"color" => "#173177"
			],
			"keyword2" =>[
				"value" => $member_info['mobile'],
				"color" => "#173177"
			],
			"remark" => [
				"value" => "感谢您支持".Yii::$app->params['title'].'.下次使用服务，不须再输入个人资料',
				"color" => "#173177"
			]
		];

		return self::send($open_id,$template_id,UrlService::buildMUrl( "/user/index" ),$data);
	}


    /**
     * 获取微信公众平台的微信公众号id
     */
    protected static function getOpenId( $member_id ){
        $open_infos = OauthMemberBind::findAll([ 'member_id' => $member_id,'type' => 1 ]);

        if( !$open_infos ){
            return false;
        }

        foreach($open_infos as $open_info){
            if( self::getPublicByOpenId($open_info['openid']) ) {
                return $open_info['openid'];
            }
        }
        return false;
    }

    public  static function send($openid,$template_id,$url,$data){
        $msg = [
            "touser" => $openid,
            "template_id" => $template_id,
            "url" => $url,
            "data" => $data
        ];

        $token = RequestService::getAccessToken();
        return RequestService::send("message/template/send?access_token=".$token,json_encode( $msg ),'POST');
    }


    protected static function getPublicByOpenId($openid){
        $token = RequestService::getAccessToken();
		$info = RequestService::send("user/info?access_token={$token}&openid={$openid}&lang=zh_CN","GET");
        if(!$info || isset($info['errcode']) ){
            return false;
        }

        if($info['subscribe']){
            return true;
        }
        return false;
    }
}

