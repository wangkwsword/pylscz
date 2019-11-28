<?php

use app\common\services\UrlService;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>预约包车</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="full-screen" content="yes">
		<meta name="browsermode" content="application">
		<meta name="x5-fullscreen" content="true">
		<meta name="x5-page-mode" content="app">
        <link rel="stylesheet" type="text/css" href="<?=UrlService::buildWwwUrl( "/css/m/lxs_index.css")?>" />
        <link rel="stylesheet" type="text/css" href="<?=UrlService::buildWwwUrl( "/css/m/lxsHeadFoot.css")?>" />
        <link rel="stylesheet" type="text/css" href="<?=UrlService::buildWwwUrl( "/css/m/order_new.css")?>" />


		<script src="<?=UrlService::buildWwwUrl( "/js/m/jquery-2.1.4.min.js")?>"></script>

		<script></script>
	</head>
	<body>

		<div class="content">
			<div class="headTop">
				<a href="javascript:history.go(-1)" class="back"><i class="iconBack"></i></a><span>详情填写</span><a class="more"><i
					 class="iconDian"></i><i class="iconDian"></i><i class="iconDian"></i></a>
			</div>
		</div>


		<div class="j_main m-main">

			<form action="" method="post" name="form_1">

				<div class="tit">
					<i></i>填写包车信息
				</div>
				<div class="txt">
					<dl>
						<dt>出发地点</dt>
						<dd class="line30"><input maxlength="100" type="text" name="fromaddress" class="o_man" placeholder="出发地点（必填）"
							 value=""></dd>
					</dl>
					<dl>
						<dt>目的地点</dt>
						<dd class="line30"><input maxlength="100" type="text" name="toaddress" class="o_man" placeholder="目的地点（必填）" value=""></dd>
					</dl>

					<dl>
						<dt>出发时间</dt>
						<dd><input maxlength="100" type="text" name="chuxingtime" class="o_man" placeholder="出发时间（必填）" value=""></dd>
					</dl>
					<dl class="J_price">
									<dt>成人</dt>
									<dd class="box-flex-1 price pd0" id="adult_price_span"><span>￥ <span id="price_d">50</span></span></dd><dd class="box-flex-2"><span class="subadd j_num"><span class="sub" data-type="adults"></span><input id="j_price_d_num" type="number" min="1" max="99" class="text_num" value="1" name="adult_num"><span class="add" data-type="adults"></span></span></dd>
								</dl>
								<dl class="J_price">
									<dt>儿童</dt>
									<dd class="box-flex-1 price pd0" id="adult_price_span"><span>￥ <span id="price_child_d">25</span></span></dd><dd class="box-flex-2"><span class="subadd j_num"><span class="sub" data-type="adults"></span><input id="j_price_child_d_num" type="number" min="0" max="99" class="text_num" value="0" name="child_num"><span class="add" data-type="adults"></span></span></dd>
								</dl>
				</div>
				<!-- <div class="tit">
					<i></i>保险信息<br>
					<span>注：购买保险需如实填写被保险人姓名与身份证号</span>
				</div>
				<div class="txt txt2 J_baoxian">
				</div>
				<script type="text" id="j_baoxian_con">
					<dl> <dt> <a href="javascript:;" class="j_baoxian_tit J_baoxian_info">*title*</a> <input type="hidden" name="*name1*" value="*id*" /> <input type="hidden" name="*name2*" value="*price*" /> </dt> <dd> <font><span class="j_baoxian_c">*price_c*</span><i class="more"></i></font> </dd> </dl> </script>
				<script></script> -->
				<div class="tit">
					<i></i>填写联系人信息
				</div>
				<div class="txt">
					<dl>
						<dt>联系人</dt>
						<dd><input maxlength="20" type="text" name="truename" class="o_man" placeholder="" value="123"></dd>
					</dl>
					<dl>
						<dt>手机号码</dt>
						<dd class="pd0"><input type="tel" name="mobiletel" id="n_mobiletel" class="o_number" maxlength="11" placeholder=""
							 value=""></dd>
						<!-- <dd style="width:8rem;-webkit-box-flex:inherit">
							<p>
								<span class="mobile_code">获取验证码</span>
							</p>
						</dd> -->
					</dl>

				</div>

				<div class="booking_notes">
					<label><i class="on"></i>我已阅读并同意此产品的</label><a href="javascript:;" class="btn_notes">预订须知</a>
					<!-- <p>
						温馨提示：为了保障您的出游权益，请务必在线支付订单。
                        </p> -->
				</div>
			</form>
			<div class="submintFix">
				<dl>
					<dt>
						<div class="price">
预计花费 <span>￥<em class="j_all_money">620</em></span>
						</div>
					</dt>
					<dd class="sbmFix"><button type="button" id="save">提交预订</button></dd>
				</dl>
			</div>
		</div>
		<script type="text" id="j_baoxian_con"> <dl> <dt> <a href="javascript:;" class="j_baoxian_tit J_baoxian_info">*title*</a> <input type="hidden" name="*name1*" value="*id*" /> <input type="hidden" name="*name2*" value="*price*" /> </dt> <dd> <font><span class="j_baoxian_c">*price_c*</span><i class="more"></i></font> </dd> </dl> </script>
				<script></script>
		<!--  -->

		<div class="notes_con" id="contentWrapper">
			<div class="text_con" id="contentScroller">
				<strong>预订须知 （免责条款）</strong><b></b>
				<p></p>

			</div>
			<a href="javascript:;" class="close"></a>
		</div>


        <script src="<?=UrlService::buildWwwUrl( "/js/m/min_com.js")?>"></script>
        <script src="<?=UrlService::buildWwwUrl( "/js/m/order_xianlu.js")?>"></script>
		<script>
			var is_dijie = '0'; /*预定须知弹窗*/
			var cart_type_num = 0;
			var myScroll;
			var mobiletel_regexp = /^1[3|4|5|7|8|9][0-9]\d{8}$/;

			function loaded() {
                // myScroll = new iScroll('contentWrapper');
            }

			function bodyscroll(e) {
                e.preventDefault();
            }
			document.addEventListener('DOMContentLoaded', function() {
                setTimeout(loaded, 200);
            }, false);
			$('.btn_notes').click(function() {
                $('.notes_con').show();
                setTimeout(loaded, 300);
                document.addEventListener('touchmove', bodyscroll, false);
            });
			$('.notes_con').click(function() {
                $(this).hide();
                document.removeEventListener('touchmove', bodyscroll, false);
            }); /*60秒倒计时*/
			var wait = 60;

			function time_d(t) {
                if (wait == 0) {
                    $(t).removeAttr("disabled").html("获取验证码");
                    wait = 60;
                } else {
                    $(t).attr("disabled", "disabled").html(wait + '秒后重新发送').addClass('disable');
                    wait--;
                    setTimeout(function() {
                        time_d(t);
                    }, 1000);
                }
            } /*游客信息检测*/


			function tourist_check() {
                var tourist_list = $(".j_kehu_open"),
					type = 1;
				for (var j = 0; j < tourist_list.length; j++) {
                    var tr = tourist_list.eq(j);
                    if (!tr.data('full')) {
                        alert('请填写<b style="color:#FFF000">游客' + (j + 1) + '</b>的信息');
                        type = 0;
                        break;
                    }
                };
				return type ? true : false;
			}; /*异步核对验证码*/


			function mobiletel_code_check() {
                var ajax_url = '/order/checkCode',
					code = $('input[name="code"]').val(),
					mobiletel = $('input[name="mobiletel"]').val();
				if (mobiletel == '') {
                    alert('请输入手机号码');
                    return false;
                } else if (!checkMobile(mobiletel)) {
                    alert('请输入正确的手机号码');
                    return false;
                } else if (code == '' || code.length != 6) {
                    alert('请输入6位验证码');
                    return false;
                }
				$('#save').addClass('not');
				$.ajax({
					url: ajax_url,
					type: 'post',
					data: {
                    mobiletel: mobiletel,
						code: code,
						inajax: 1
					},
					dataType: 'json',
					success: function(data) { /*console.log(data);*/
                    if (data == '1') {
                        alert('手机验证完毕');
                        document.form_1.submit();
                    } else {
                        $('#save').removeClass('not');
                        if (data == '-1') {
                            alert('手机号码错误');
                            return false;
                        } else if (data == '-2') {
                            alert('验证码错误');
                            return false;
                        } else {
                            alert('意外错误');
                            return false;
                        }
                    }
                },
					error: function() {
                    $('#save').removeClass('not');
                    alert('意外错误');
                    return false
					}
				});
			}
			$(function() { /*表单提交*/
                $('#save').click(function(e) {

                    e.stopPropagation();
                    if ($('#save').hasClass('not')) return false;
                    var uid = parseInt($("#uid").val()); /*检测游客填写的身份信息*/
                    if (!tourist_check()) {
                        return false;
                    }
                    var true_name = $('input[name="truename"]').val(),
						fromaddress = $('input[name="fromaddress"]').val(),
						toaddress = $('input[name="toaddress"]').val(),
						chuxingtime = $('input[name="chuxingtime"]').val(),
						mobiletel = $('input[name="mobiletel"]').val();
					if (true_name == '') {
                        alert('联系人为必须填写项');
                        return false;
                    } else if (true_name.length < 2) {
                        alert('联系人过短，请重新输入');
                        return false;
                    } else if (true_name.length > 10) {
                        alert('联系人长度仅限10个字符，请重新输入');
                        return false;
                    } else if (mobiletel == '') {
                        alert('手机号码为必须填写项');
                        return false;
                    } else if (mobiletel.length != 11 || !mobiletel_regexp.test(mobiletel)) {
                        alert('手机号码不正确，请重新输入');
                        return false;
                    } else if (fromaddress == '') {
                        alert('出发地必须填写项');
                        return false;
                    } else if (toaddress == '') {
                        alert('目的地为必须填写项');
                        return false;
                    } else if (chuxingtime == '') {
                        alert('出发时间必须填写项');
                        return false;
                    }
					if (!$('.booking_notes i').hasClass('on')) {
                        alert('请阅读并同意此产品的预订须知');
                        return false;
                    }
					if (uid == 0) {
                        mobiletel_code_check();
                    } else {
                        $('#save').addClass('not');
                        document.form_1.submit();
                    }
				}); /*发送手机验证码*/
                $(".mobile_code").click(function() {
                    var th = $(this),
						tel = $("#n_mobiletel").val(),
						r_url = '/account/getcode?inajax=1&mobiletel=' + tel + '&idtype=4';
					if (tel == '') {
                        alert('请先输入手机号码');
                        return false;
                    }
					if (tel.length != 11 || !mobiletel_regexp.test(tel)) {
                        alert('手机号码不正确，请您重新输入');
                        return false
					}
					if (th.hasClass('not')) {
                        return false;
                    }
					th.addClass('not');
					setTimeout(function() {
                        th.removeClass('not');
                    }, 60000);
					$.get(r_url, function(data) {
                        if (data == '1') {
                            alert('短信已发送，请查看');
                        } else if (data == '-1') {
                            alert('获取失败，手机号码不能为空');
                        } else if (data == '-2') {
                            alert('获取失败，手机号码错误');
                        } else if (data == '-3') {
                            alert('获取失败，该手机已被注册');
                        } else if (data == '-4') {
                            alert('您的操作太频繁，请稍候再试');
                        } else if (data == '-8') {
                            alert('同一ip一天最多10条短信');
                        } else if (data == '-5') {
                            alert('同一手机一个月最多5条短信');
                        } else if (data == '-6') {
                            alert('获取失败，获取验证时间间隔60秒');
                        } else {
                            alert('获取失败');
                        }
                    });
				}); /*改变证件类型事件*/
                $('#j_kehu_list').on('change', '.tourist_box .certificate_type', function() {

                    placeholder = mark + '号码（必填）';
                    cur.closest('dl').next('dl').find('dt').html(mark).siblings('dd').find('input[type="text"]').attr(
                        'placeholder', placeholder);
                });
            });

			function guoqing_yh() {

            }
		</script>
	</body>
</html>
