<?php

use \app\common\services\UrlService;
use \app\common\services\StaticService;
use app\common\services\UtilService;

StaticService::includeAppJsStatic("/js/m/product/order.js", \app\assets\MAsset::className());
?>
<div class="page_title clearfix">
    <span>订单提交</span>
</div>
<div class="order_box">
    <div class="order_header">
        <h2>确认常用地址</h2>
    </div>

    <ul class="address_list">
        <?php if ($address_list): ?>
            <?php foreach ($address_list as $_idx => $_address_info): ?>
                <li style="padding: 5px 5px;">
                    <label>
                        <input style="display: inline;" type="radio" name="address_id"
                               value="<?= $_address_info['id']; ?>" <?php if ($_address_info['is_default'] || $_idx == 0): ?> checked <?php endif; ?> >
                        <?= $_address_info['address']; ?>（<?= $_address_info['nickname']; ?>
                        乘车）<?= $_address_info['mobile']; ?>
                    </label>

                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li style="padding: 5px 5px;"><a href="<?= UrlService::buildMUrl('/user/address_set'); ?>">快去添加常用地址啦~~</a>
            </li>
        <?php endif; ?>
    </ul>


    <div class="order_header">
        <h2>确认订单信息</h2>
    </div>
    <?php if ($product_list): ?>
        <ul class="order_list">
            <?php foreach ($product_list as $_item): ?>
                <li data="<?= $_item["id"]; ?>" data-quantity="<?= $_item['quantity']; ?>"
                    data-chuxingtime="<?= $_item['chuxingtime']; ?>">
                    <a href="<?= UrlService::buildMUrl("/product/info", ["id" => $_item['id']]); ?>">
                        <i class="pic">
                            <img src="<?= $_item["main_image"]; ?>" style="width: 100px;height: 100px;"/>
                        </i>
                        <h2><?= $_item['name']; ?> x <?= $_item['quantity']; ?>人</h2>
                        <h4>&nbsp;</h4>
                        <b>日期：<?= $_item['chuxingtime']; ?></b>
                        <?php if ($_item['id'] == 99999): ?>
                            <b>我们会与您商议价格</b>
                        <?php else: ?>
                            <b>单人票价：¥ <?= $_item['price']; ?></b>
                        <?php endif; ?>


                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="order_header" style="border-top: 1px dashed #ccc;">
        <?php if ($_item['id'] == 99999): ?>
            <h2>我们会与您商议价格</h2>
        <?php else: ?>
            <h2>总计：<?= $total_pay_money; ?></h2>
        <?php endif; ?>

    </div>
</div>
<div class="op_box">
    <input type="hidden" name="sc" value="<?= $sc; ?>">
    <input style="width: 100%;" type="button" value="确定预约" class="red_btn do_order"/>
</div>
