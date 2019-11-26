<?php
use \app\common\services\UrlService;
use \app\common\services\UtilService;
use \app\common\services\StaticService;
StaticService::includeAppJsStatic( "/js/m/product/info.js",\app\assets\MAsset::className() );
?>
<link href="https://cdn.bootcss.com/mui/3.7.1/css/mui.min.css" rel="stylesheet">
<div class="pro_tab clearfix">
    <span>线路详情</span>
</div>
<div class="proban">
    <div id="slideBox" class="slideBox">
        <div class="bd">
            <ul>
                <li><img src="<?=UrlService::buildPicUrl("book",$info['main_image'] );?>"/></li>
            </ul>
        </div>
    </div>
</div>
<div class="pro_header">
    <div class="pro_tips">
        <h2><?=UtilService::encode( $info['name'] );?></h2>
        <h3><b>预付定金¥<?=UtilService::encode( $info['price'] );?></b>
<!--            <font>库存量：--><?//=$info['stock'];?><!--</font>-->
        </h3>
    </div>
<!--    <span class="share_span"><i class="share_icon"></i><b>分享商品</b></span>-->
</div>
<div class="pro_express">月预订人数：<?=$info['month_count'];?><b>累计评价：<?=$info['comment_count'];?></b></div>
<!--<div class="pro_virtue">-->
<!--    <div class="pro_vlist">-->
<!--        <b>数量</b>-->
<!--        <div class="quantity-form">-->
<!--            <a class="icon_lower"></a>-->
<!--            <input type="text" name="quantity" class="input_quantity" value="1" readonly="readonly" max="--><?//=$info["stock"];?><!--"/>-->
<!--            <a class="icon_plus"></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



<div class="mui-content" style="padding: 5px">
    <b>出行人数</b>
    <div class="mui-numbox" data-numbox-min='1' data-numbox-max='9'>
        <button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
        <input id="test" name="quantity" class="mui-input-numbox" type="number" value="1" />
        <button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
    </div>
    <div class="mui-content-padded" >

        <button id='demo7'
            <?php if( $info['id']==1 ):?>
                data-options='{"type":"hour","customData":{"h":[{"text":"5:30","value":"5:30"},{"text":"15:30","value":"15:30"}]},"labels":["年", "月", "日", "时段", "分"]}'
            <?php elseif( $info['id']==2 ):?>
                data-options='{"type":"hour","customData":{"h":[{"text":"6:00","value":"6:00"},{"text":"8:00","value":"8:00"},{"text":"13:40","value":"13:40"},{"text":"14:00","value":"14:00"},{"text":"14:30","value":"14:30"}]},"labels":["年", "月", "日", "时段", "分"]}'
            <?php elseif( $info['id']==3 ):?>
                data-options='{"type":"hour","customData":{"h":[{"text":"7:00","value":"7:00"},{"text":"8:30","value":"8:30"},{"text":"13:00","value":"13:00"},{"text":"15:00","value":"15:00"}]},"labels":["年", "月", "日", "时段", "分"]}'
            <?php elseif( $info['id']==4 ):?>
                data-options='{"type":"hour","customData":{"h":[{"text":"9:00","value":"9:00"},{"text":"9:40","value":"9:40"},{"text":"10:20","value":"10:20"},{"text":"11:10","value":"11:10"},{"text":"15:40","value":"15:40"},{"text":"16:20","value":"16:20"},{"text":"17:00","value":"17:00"},{"text":"17:40","value":"17:40"}]},"labels":["年", "月", "日", "时段", "分"]}'
            <?php elseif( $info['id']==5 ):?>
                data-options='{"type":"hour","customData":{"h":[{"text":"9:00","value":"9:00"},{"text":"16:00","value":"16:00"}]},"labels":["年", "月", "日", "时段", "分"]}'
            <?php endif;?>
                class="btn mui-btn mui-btn-block">选择出行时间
        </button>
        <div id='result' class="ui-alert"></div>
        <div class="mui-card">
            <div class="mui-card-header">关于定金</div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    本车次全额票价为：元。本次仅为支付定金。
                </div>
            </div>
            <div class="mui-card-header">关于接送</div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    这里是关于接送的说明
                </div>
            </div>
            <div class="mui-card-header">注意事项</div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    购票
                    1、全价票:成人及身高1.5米以上的儿童须购买全票。
                    2、儿童票:身高满1.2米至不满1.5米的儿童须购买半价儿童票供给座
                    3、军票:残废军人凭民政部颁发的《革命残废军人抚恤证》购买半价优待票，享受全价票旅客待遇。
                    4、持一张全价票的旅客可免费携带1.2米以下儿童一人乘车，但不供给座位，携带免费乘车儿童超过一人或要求供给座位时，须购买儿童票。
                    乘车人
                    1、购票时须如实、准确无误地填写乗车人姓名、有效证件身份证号码(二代身份证18位)。
                    2、购买者没有如实或错误填写乘车人姓名和有效身份证件，造成乘车人无法乘车，与本平台无关，责任由购买人自行承担。
                    3、乘车人经确认购票成功后，请于乘车当日发车前10分钟持本人身份证原件到阜新客运总站候车大厅1号检票口检票员处取票乘车。客服电话:0531-87883369
                    乘车座位选择
                    1、用户购票时，乘车座位是根据购票时间先后顺序产生，暂不支持选择座位，敬请谅解。
                    其他事项
                    1、不限购、但须实名制购买2、车票过期作废，不予退款。
                </div>
            </div>
        </div>
    </div>
</div>




<div class="pro_warp">
    <?=nl2br($info['summary']);?>
</div>
<div class="pro_fixed clearfix">
    <a href="<?= UrlService::buildMUrl("/"); ?>"><i class="sto_icon"></i><span>首页</span></a>
    <?php if( $has_faved ):?>
        <a class="fav has_faved" href="<?= UrlService::buildNullUrl( ); ?>"><i class="keep_icon"></i><span>已收藏</span></a>
    <?php else:?>
        <a class="fav" href="<?= UrlService::buildNullUrl( ); ?>" data="<?=$info['id'];?>"><i class="keep_icon"></i><span>收藏</span></a>
    <?php endif;?>
    <input type="button" value="立即预约" class="order_now_btn" data="<?=$info['id'];?>"/>
    <input type = "hidden" type="button" value="加入出行计划" class="add_cart_btn" data="<?=$info['id'];?>"/>
    <input type="hidden" name="id" value="<?=$info['id'];?>">
</div>
