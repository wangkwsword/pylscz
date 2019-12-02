;

var product_baoche = {
    init:function(){
        this.eventBind();
    },
    eventBind:function(){

        $(".save").click( function(){
            var btn_target = $(this);
            if( btn_target.hasClass("disabled") ){
                common_ops.alert("正在处理!!请不要重复提交~~");
                return;
            }

            var truename = $("input[name=truename]");
            var nickname = truename.val();
            var mobile_target = $("input[name=mobiletel]");
            var mobile = mobile_target.val();

            var fromaddress_target = $(".wrap_account_set input[name=fromaddress]");
            var fromaddress = fromaddress_target.val();
            var toaddress_target = $(".wrap_account_set input[name=toaddress]");
            var toaddress = toaddress_target.val();
            var chuxingtime_target = $(".wrap_account_set input[name=login_pwd]");
            var chuxingtime = chuxingtime_target.val();
            var chengren_target = $(".wrap_account_set input[name=login_pwd]");
            var chengren = chengren_target.val();
            var ertong_target = $(".wrap_account_set input[name=login_pwd]");
            var ertong = ertong_target.val();




            btn_target.addClass("disabled");

            var data = {
                nickname:nickname,
                mobile:mobile,
                fromaddress:fromaddress,
                toaddress:toaddress,
                chengren:chengren,
                ertong:ertong,
                chuxingtime:chuxingtime,

            };
            alert(data);

            $.ajax({
                url:common_ops.buildMUrl("/product/baoche") ,
                type:'POST',
                data:data,
                dataType:'json',
                success:function(res){
                    btn_target.removeClass("disabled");
                    alert( res.msg );
                    if( res.code == 200 ){
                        window.location.href = res.data.url;
                    }
                }
            });
        });
    }
};

$(document).ready( function(){
    product_baoche.init();
});