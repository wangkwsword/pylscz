;
var upload = {
    error:function(msg){
        $.alert(msg);
    },
    success:function(file_key,type){
        if(!file_key){
            return;
        }
        var html = '<img src="'+common_ops.buildPicUrl("book",file_key)+'"/>'
            +'<span class="fa fa-times-circle del del_image" data="'+file_key+'"></span>';

        if( $(".upload_pic_wrap .pic-each").size() > 0 ){
            $(".upload_pic_wrap .pic-each").html( html );
        }else{
            $(".upload_pic_wrap").append('<span class="pic-each">'+ html + '</span>');
        }
        book_set_ops.delete_img();
    }
};

var book_set_ops = {
    init:function(){
        this.ue = null;
        this.eventBind();
        this.initEditor();
    },
    eventBind:function(){
        var that = this;

        $(".wrap_book_set .upload_pic_wrap input[name=pic]").change(function(){
            $(".wrap_book_set .upload_pic_wrap").submit();
        });

        $(".wrap_book_set input[name=tags]").tagsInput({
            width:'auto',
            height:40,
            onAddTag:function(tag){
            },
            onRemoveTag:function(tag){
            }
        });

        $(".wrap_book_set select[name=cat_id]").select2({
            language: "zh-CN",
            width:'100%'
        });

        $(".wrap_book_set .save").click( function(){
            var btn_target = $(this);
            if( btn_target.hasClass("disabled") ){
                common_ops.alert("正在处理!!请不要重复提交~~");
                return;
            }

            var cat_id_target = $(".wrap_book_set select[name=cat_id]");
            var cat_id = cat_id_target.val();

            var name_target = $(".wrap_book_set input[name=name]");
            var name = name_target.val();

            var price_target = $(".wrap_book_set input[name=price]");
            var price = price_target.val();

            var summary  = $.trim( that.ue.getContent() );

            var stock_target = $(".wrap_book_set input[name=stock]");
            var stock = stock_target.val();

            var tags_target = $(".wrap_book_set input[name=tags]");
            var tags = $.trim( tags_target.val() );

            if( parseInt( cat_id ) < 1 ){
                common_ops.tip( "请输入线路分类~~" ,cat_id_target );
                return;
            }

            if( name.length < 1 ){
                common_ops.alert( "请输入符合规范的线路名称~~" );
                return;
            }

            if( parseFloat( price ) <= 0 ){
                common_ops.tip( "请输入符合规范的线路预订价格~~" ,price_target );
                return;
            }

            if( $(".wrap_book_set .pic-each").size() < 1 ){
                common_ops.alert( "请上传封面图~~"  );
                return;
            }

            if( summary.length < 10 ){
                common_ops.tip( "请输入线路描述，并不能少于10个字符~~" ,price_target );
                return;
            }

            if( parseInt( stock ) < 1 ){
                common_ops.tip( "请输入符合规范的库存量~~" ,stock_target );
                return;
            }

            if( tags.length < 1 ){
                common_ops.alert( "请输入线路标签，便于搜索~~" );
                return;
            }

            btn_target.addClass("disabled");

            var data = {
                cat_id:cat_id,
                name:name,
                price:price,
                main_image:$(".wrap_book_set .pic-each .del_image").attr("data"),
                summary:summary,
                stock:stock,
                tags:tags,
                id:$(".wrap_book_set input[name=id]").val()
            };

            $.ajax({
                url:common_ops.buildWebUrl("/book/set") ,
                type:'POST',
                data:data,
                dataType:'json',
                success:function(res){
                    btn_target.removeClass("disabled");
                    var callback = null;
                    if( res.code == 200 ){
                        callback = function(){
                            window.location.href = common_ops.buildWebUrl("/book/index");
                        }
                    }
                    common_ops.alert( res.msg,callback );
                }
            });

        });

    },
    initEditor:function(){
        var that = this;
        that.ue = UE.getEditor('editor',{
            toolbars: [
                [ 'undo', 'redo', '|',
                    'bold', 'italic', 'underline', 'strikethrough', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall',  '|','rowspacingtop', 'rowspacingbottom', 'lineheight'],
                [ 'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                    'directionalityltr', 'directionalityrtl', 'indent', '|',
                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                    'link', 'unlink'],
                [ 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                    'horizontal', 'spechars','|','inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols' ]

            ],
            enableAutoSave:true,
            saveInterval:60000,
            elementPathEnabled:false,
            zIndex:4
        });
        that.ue.addListener('beforeInsertImage', function (t,arg){
            console.log( t,arg );
            //alert('这是图片地址：'+arg[0].src);
            // that.ue.execCommand('insertimage', {
            //     src: arg[0].src,
            //     _src: arg[0].src,
            //     width: '250'
            // });
            return false;
        });
    },
    delete_img:function(){
        $(".wrap_book_set .del_image").unbind().click(function(){
            $(this).parent().remove();
        });
    }
};

$(document).ready( function(){
    book_set_ops.init();
} );