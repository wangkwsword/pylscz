;
var product_info_ops = {
    init:function(){
        this.eventBind();
        this.updateViewCount();
    },
    eventBind:function(){
        $(".fav").click( function(){

            if( $(this).hasClass("has_faved") ){
                return false;
            }

            $.ajax({
                url:common_ops.buildMUrl("/product/fav"),
                type:'POST',
                data:{
                    book_id:$(this).attr("data"),
                    act:'set'
                },
                dataType:'json',
                success:function( res ){
                    if( res.code == -302 ){
                        common_ops.notlogin( );
                        return;
                    }
                    alert( res.msg );
                }
            });
        });

        $(".add_cart_btn").click( function() {
            var chuxingtime = $("#result").text();
            if( chuxingtime == undefined||chuxingtime==""){
                alert("请选择出行时间~~");
                return;
            }
            $.ajax({
                url:common_ops.buildMUrl("/product/cart"),
                type:'POST',
                data:{
                    act:'set',
                    book_id:$(this).attr("data"),
                    quantity:$(".quantity-form input[name=quantity]").val(),
                    chuxingtime:chuxingtime
                },
                dataType:'json',
                success:function( res ){
                    if( res.code == -302 ){
                        common_ops.notlogin( );
                        return;
                    }
                    alert( res.msg );
                }
            });
        });

        $(".order_now_btn").click( function(){

            if ($(this).attr("data")==99999){
                var fromaddress = $('input[name="fromaddress"]').val();
                var toaddress = $('input[name="toaddress"]').val();
                var chuxingtime = $("#result").text();
                if(chuxingtime == undefined||chuxingtime==""){
                    alert("请选择出行时间~~");
                    return;
                }
                if(fromaddress.length<2){
                    alert("请输入出发地点");
                    return;
                }
                if(toaddress.length<2){
                    alert("请输入目的地~~");
                    return;
                }
                window.location.href = common_ops.buildMUrl("/product/order",{ 'id':$(this).attr("data"),fromaddress:fromaddress,toaddress:toaddress,chuxingtime:chuxingtime,quantity:$("input[name=quantity]").val() } )


            }else{
            var chuxingtime = $("#result").text();
            if(chuxingtime == undefined||chuxingtime==""){
                alert("请选择出行时间~~");
                return;
            }
            window.location.href = common_ops.buildMUrl("/product/order",{ 'id':$(this).attr("data"),chuxingtime:chuxingtime,quantity:$("input[name=quantity]").val() } )}
        });

        //加减效果 start
        $(".quantity-form .icon_lower").click(function () {
            var num = parseInt($(this).next(".input_quantity").val());
            if (num > 1) {
                $(this).next(".input_quantity").val(num - 1);
            }
        });
        $(".quantity-form .icon_plus").click(function () {
            var num = parseInt($(this).prev(".input_quantity").val());
            var max = parseInt($(this).prev(".input_quantity").attr("max"));
            if (num < max) {
                $(this).prev(".input_quantity").val(num + 1);
            }
        });
        //加减效果 end

    },
    updateViewCount:function(){
        $.ajax({
            url:common_ops.buildMUrl("/product/ops"),
            type:'POST',
            data:{
                act:'view_count',
                book_id:$(".pro_fixed input[name=id]").val()
            },
            dataType:'json',
            success:function( res ){
            }
        });
    }
};

$(document).ready( function(){
    product_info_ops.init();
});