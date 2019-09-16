<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:39:"./template/mobile/new2/index\index.html";i:1568097349;s:41:"./template/mobile/new2/public\footer.html";i:1567818311;s:45:"./template/mobile/new2/public\footer_nav.html";i:1567818311;s:43:"./template/mobile/new2/public\wx_share.html";i:1567818311;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $tpshop_config['shop_info_store_title']; ?></title>
<link rel="stylesheet" href="__STATIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont.css"/>
<script src="__STATIC__/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/js/layer.js"  type="text/javascript" ></script>
</head>
<body>
<!--顶部搜索栏-s-->
<header>
  <div class="content">
    <div class="ds-in-bl logo"><a href="<?php echo U('Mobile/Index/index'); ?>"><img src="__STATIC__/images/logo.png" alt="爱丽安轻"></a></div>
    <div class="ds-in-bl search">
      <div class="sea-box  "><span ></span>
        <form action=""  method="post">
          <div class="sear-input"><a href="<?php echo U('Goods/ajaxSearch'); ?>">
            <input type="text" name="q" id="search_text" class="search_text"   value="" placeholder="请输入您所搜索的商品">
            </a></div>
        </form>
      </div>
    </div>
    <div class="ds-in-bl login"> <span>
      <?php if($user_id > 0): ?><a href="<?php echo U('Mobile/User/index'); ?>"> <img height="24px" src="__STATIC__/images/my.png"></a>
        <?php else: ?>
        <a href="<?php echo U('Mobile/User/login'); ?>">登录</a><?php endif; ?>
      </span></div>
  </div>
</header>
<!--顶部搜索栏-e--> 

<!--顶部滚动广告栏-s-->
<div class="banner ban1">
  <div class="mslide" id="slideTpshop">
    <ul>
      <!--广告表-->
      <?php $pid =2;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1568278800 and end_time > 1568278800 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("5")->select();
if(!in_array($pid,array_keys($ad_position)) && $pid)
{
  M("ad_position")->insert(array(
         "position_id"=>$pid,
         "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ",
         "is_open"=>1,
         "position_desc"=>CONTROLLER_NAME."页面",
  ));
  delFile(RUNTIME_PATH); // 删除缓存
  \think\Cache::clear();  
}


$c = 5- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && I("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "ad_code" => "/public/images/not_adv.jpg",
          "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid",
          "title"   =>"暂无广告图片",
          "not_adv" => 1,
          "target" => 0,
      );  
    }
}
foreach($result as $key=>$v):       
    
    $v[position] = $ad_position[$v[pid]]; 
    if(I("get.edit_ad") && $v[not_adv] == 0 )
    {
        $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]";        
        $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name];
        $v[target] = 0;
    }
    ?>
        <li><a href="<?php echo $v['ad_link']; ?>"> <img src="<?php echo $v[ad_code]; ?>" title="<?php echo $v[title]; ?>" style="<?php echo $v[style]; ?>" alt=""> </a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<!--顶部滚动广告栏-e--> 
<script>
	function hello(){ 
	$("#slideTpshop").css('overflow','hidden'); 
	 //$("#myoprest").css('display','none'); 
	} 
	var t1 = window.setTimeout(hello,1000); 
	var t2 = window.setTimeout("hello()",1000);//使用字符串执行方法 
	window.clearTimeout(t1);//去掉定时器  
</script> 
<!--菜单-start-->
<div class="floor dh">
    <nav> <a href="<?php echo U('Index/Index'); ?>" style="width:25%;"> <span> <img src="__STATIC__/images/my_icon_01.png" alt="商城首页" /><br />
    <span>商城首页</span> </span> </a> 
    
    <a href="<?php echo U('Distribut/index'); ?>" style="width:25%;"> <span> <img src="__STATIC__/images/icon_16.png" alt="分销中心" /><br />
    <span>分销中心</span> </span> </a>
    
    <a href="<?php echo U('User/index'); ?>" style="width:25%;"> <span> <img src="__STATIC__/images/icon_19.png" alt="会员中心" /><br />
    <span>会员中心</span> </span> </a>
   
      <!--<a href="<?php echo U('Goods/categoryList'); ?>">
                <span>
                    <img src="__STATIC__/images/icon_03.png" alt="全部分类" /><br />
                    <span>全部分类</span>
                </span>
            </a>-->
            
            <a href="<?php echo U('Distribut/must_see'); ?>" style="width:25%;">
                <span>
                    <img src="__STATIC__/images/icon_07.png" alt="新手必看" /><br />
                    <span>新手必看</span>
                </span>
            </a> 
   
    
   </nav>
</div>
<!--菜单-end--> 

<!--秒杀-start--> 
<!--<div class="floor secondkill" style="display:none">
        <div class="content">
            <div class="time p">
                <div class="djs lightning fl">
                    <span class="add">秒杀</span>
                    <span class="red" id=""><?php echo date('H',$start_time); ?>点场</span>
                    <span class="hms"></span>
                </div>
                <div class="xsxl fr">
                    <a href="<?php echo U('Mobile/Activity/flash_sale_list'); ?>">
                        <span>限时限量<img src="__STATIC__/images/or.png" alt="" /></span>
                    </a>
                </div>
            </div>
            <div class="shop p">
                <?php if(count($flash_sale_list) == nll): ?>
                    <div style="text-align: center;">暂无抢购商品。。。。</div>
                <?php endif; if(is_array($flash_sale_list) || $flash_sale_list instanceof \think\Collection || $flash_sale_list instanceof \think\Paginator): if( count($flash_sale_list)==0 ) : echo "" ;else: foreach($flash_sale_list as $key=>$v): ?>
                    <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>">
                        <div class="timerBox shopnum">
                            <img src="<?php echo goods_thum_images($v[goods_id],200,200); ?>"/>
                            <p>￥<span><?php echo $v[price]; ?></span>元</p>
                        </div>
                    </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>--> 
<!--秒杀-end--> 

<!--广告位-start--> 
<!--<div class="banner ma-to-20">
        <?php $pid =400;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1568278800 and end_time > 1568278800 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
if(!in_array($pid,array_keys($ad_position)) && $pid)
{
  M("ad_position")->insert(array(
         "position_id"=>$pid,
         "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ",
         "is_open"=>1,
         "position_desc"=>CONTROLLER_NAME."页面",
  ));
  delFile(RUNTIME_PATH); // 删除缓存
  \think\Cache::clear();  
}


$c = 1- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && I("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "ad_code" => "/public/images/not_adv.jpg",
          "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid",
          "title"   =>"暂无广告图片",
          "not_adv" => 1,
          "target" => 0,
      );  
    }
}
foreach($result as $key=>$v):       
    
    $v[position] = $ad_position[$v[pid]]; 
    if(I("get.edit_ad") && $v[not_adv] == 0 )
    {
        $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]";        
        $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name];
        $v[target] = 0;
    }
    ?>
            <a href="<?php echo $v['ad_link']; ?>">
            <img src="<?php echo $v[ad_code]; ?>" title="<?php echo $v[title]; ?>" style="<?php echo $v[style]; ?>"/>
            </a>
        <?php endforeach; ?>
    </div>-->



<!--广告位-end--> 

<!--新品上市-start--> 
<!--<div class="floor newshop">
        <div class="banner">
            <img src="__STATIC__/images/ind_22.jpg" alt="新品上市"/>
        </div>
        <div class="advertisement">
            <div class="content">
                <div class="le re fl">
                    <?php
                                   
                                $md5_key = md5("select * from __PREFIX__goods where is_new=1 and is_on_sale = 1 order by sort limit 1");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from __PREFIX__goods where is_new=1 and is_on_sale = 1 order by sort limit 1"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                        <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>" >
                            <div class="td">
                                <img src="<?php echo goods_thum_images($v['goods_id'],400,400); ?>"/>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="le lefhe fr">
                    <?php
                                   
                                $md5_key = md5("select * from __PREFIX__goods where is_new=1 and is_on_sale = 1 order by sort limit 1, 2");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from __PREFIX__goods where is_new=1 and is_on_sale = 1 order by sort limit 1, 2"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                        <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>" >
                            <div class="td">
                                <img src="<?php echo goods_thum_images($v['goods_id'],400,400); ?>"/>
                            </div>
                        </a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>--> 
<!--新品上市-end--> 

<!--热销商品-start--> 
        <div class="floor hotshop index_hot">
        <div class="banner">
            <img src="__STATIC__/images/ind_33.jpg" alt="所有商品"/>
        </div>
        <div class="hotsome">
            <div class="bloc ">
                <?php
                                   
                                $md5_key = md5("select * from __PREFIX__goods where  is_on_sale = 1 order by sort limit 100");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from __PREFIX__goods where  is_on_sale = 1 order by sort limit 100"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                    <div class="le " style=" width:100%; text-align:center;">
                        <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>" style="width:50%;float:left;">
<img style="width:96%; height:auto;  " src="<?php echo goods_thum_images($v['goods_id'],350,400); ?>"/><p style=" font-size:0.7rem;width:100%; "><?php echo $v['goods_name']; ?></p><p style="color:#F00;font-size:0.7rem;width:100%;">¥<?php echo $v['shop_price']; ?></p>
</a> 
                    </div>
                <?php endforeach; ?>
            </div>
            <!--<div class="bloc">
                <div class="le foura">
                    <?php
                                   
                                $md5_key = md5("select * from __PREFIX__goods where is_hot=1 and is_on_sale = 1 order by sort limit 3,4");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from __PREFIX__goods where is_hot=1 and is_on_sale = 1 order by sort limit 3,4"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                    <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>"><img src="<?php echo goods_thum_images($v['goods_id'],450,600); ?>"/></a>
                    <?php endforeach; ?>
                </div>
            </div>-->
        </div>
    </div> 
<!--热销商品-end--> 

<!--猜您喜欢-start-->
<!--<div class="floor guesslike">
  <div class="banner"> <img src="__STATIC__/images/ind_52.jpg" alt="猜您喜欢"/> </div>
  <div class="likeshop">
    <div id="J_ItemList">
      <ul class="product single_item info">
      </ul>
      <a href="javascript:;" class="get_more" style="text-align:center; display:block;"> <img src='__STATIC__/images/category/loader.gif' width="12" height="12"> </a> </div>
  </div>
  <div class="loadbefore"> <img class="ajaxloading" src="__STATIC__/images/loading.gif" alt="loading..."> </div>
</div>-->
<!--猜您喜欢-end--> 

<!--底部-start--> 
<footer>
    <div class="flool1">
        <ul>
            <?php if(!empty($_COOKIE['user_id'])): ?>
                <li><a href="<?php echo U('Mobile/User/index'); ?>"><?php echo getSubstr(urldecode($_COOKIE['uname']),0,3);?></a></li>
                <li><a href="<?php echo U('Mobile/User/logout'); ?>">退出</a></li>
            <?php else: ?>
                <li><a href="<?php echo U('Mobile/User/login'); ?>">登录</a></li>
                <li><a href="<?php echo U('Mobile/User/reg'); ?>">注册</a></li>
            <?php endif; ?>
            <!--<li><a href="">反馈</a></li>
-->
            <li class="comebackTop">回到顶部</li>
        </ul>
    </div>
    
    <div class="flool3">
        <p>Copyright © 2018 爱丽安轻创业联盟商城</p>
    </div>
</footer> 
<!--底部-end--> 

<!--底部导航-start--> 
<div class="foohi">
    <div class="footer">
        <ul>
            <li style="width:33.33%">
                <a <?php if(CONTROLLER_NAME == 'Index'): ?>class="yello" <?php endif; ?>  href="<?php echo U('Index/index'); ?>">
                    <div class="icon">
                        <i class="icon-shouye iconfont"></i>
                        <p>商城</p>
                    </div>
                </a>
            </li>
            <li  style="width:33.33%">
                <a href="<?php echo U('Distribut/index'); ?>">
                    <div class="icon">
                        <i class="icon-fenlei iconfont"></i>
                        <p>分销</p>
                    </div>
                </a>
            </li>
            <!--<li style="width:33.33%">
                <a href="<?php echo U('Cart/cart'); ?>">
                    <div class="icon">
                        <i class="icon-gouwuche iconfont"></i>
                        <p>购物车</p>
                    </div>
                </a>
            </li>-->
            <li style="width:33.33%">
                <a <?php if(CONTROLLER_NAME == 'User'): ?>class="yello" <?php endif; ?> href="<?php echo U('User/index'); ?>">
                    <div class="icon">
                        <i class="icon-wode iconfont"></i>
                        <p>我的</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	  var cart_cn = getCookie('cn');
	  if(cart_cn == ''){
		$.ajax({
			type : "GET",
			url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
			success: function(data){								 
				cart_cn = getCookie('cn');
				$('#cart_quantity').html(cart_cn);						
			}
		});	
	  }
	  $('#cart_quantity').html(cart_cn);
});
</script>
<!-- 微信浏览器 调用微信 分享js-->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
<script type="text/javascript">
<?php if(ACTION_NAME == 'goodsInfo'): ?>
   var ShareLink = "http://<?php echo $_SERVER[HTTP_HOST]; ?>/index.php?m=Mobile&c=Goods&a=goodsInfo&id=<?php echo $goods[goods_id]; ?>"; //默认分享链接
   var ShareImgUrl = "http://<?php echo $_SERVER[HTTP_HOST]; ?><?php echo goods_thum_images($goods[goods_id],400,400); ?>"; // 分享图标
<?php else: ?>
   var ShareLink = "http://<?php echo $_SERVER[HTTP_HOST]; ?>/index.php?m=Mobile&c=Index&a=index"; //默认分享链接
   var ShareImgUrl = "http://<?php echo $_SERVER[HTTP_HOST]; ?><?php echo $tpshop_config['shop_info_store_logo']; ?>"; //分享图标
<?php endif; ?>

var is_distribut = getCookie('is_distribut'); // 是否分销代理
var user_id = getCookie('user_id'); // 当前用户id
//alert(is_distribut+'=='+user_id);
// 如果已经登录了, 并且是分销商
if(parseInt(is_distribut) == 1 && parseInt(user_id) > 0)
{									
	ShareLink = ShareLink + "&first_leader="+user_id;									
}

$(function() {
	if(isWeiXin() && parseInt(user_id)>0){
		$.ajax({
			type : "POST",
			url:"/index.php?m=Mobile&c=Index&a=ajaxGetWxConfig&t="+Math.random(),
			data:{'askUrl':encodeURIComponent(location.href.split('#')[0])},		
			dataType:'JSON',
			success: function(res)
			{
				//微信配置
				wx.config({
				    debug: false, 
				    appId: res.appId,
				    timestamp: res.timestamp, 
				    nonceStr: res.nonceStr, 
				    signature: res.signature,
				    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage','onMenuShareQQ','onMenuShareQZone','hideOptionMenu'] // 功能列表，我们要使用JS-SDK的什么功能
				});
			},
			error:function(){
				return false;
			}
		}); 

		// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
		wx.ready(function(){
		    // 获取"分享到朋友圈"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareTimeline({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
		    });

		    // 获取"分享给朋友"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareAppMessage({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
		    });
			// 分享到QQ
			wx.onMenuShareQQ({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});	
			// 分享到QQ空间
			wx.onMenuShareQZone({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});

		   <?php if(CONTROLLER_NAME == 'User'): ?> 
				wx.hideOptionMenu();  // 用户中心 隐藏微信菜单
		   <?php endif; ?>	
		});
	}
});

function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        return true;
    }else{
        return false;
    }
}
</script>
<!--微信关注提醒 start-->
<?php if(\think\Session::get('subscribe') == 0): endif; ?>
<button class="guide" style="display:none;color:#F00;" onclick="follow_wx()" >点击关注公众号</button>

<style type="text/css">
.guide{width:1rem;height:4rem;text-align: center;border-radius: 0.2rem ;font-size:0.5rem;padding:0.2rem 0;border:1px solid #adadab;color:#000000;background-color: #fff;position: fixed;right: 0.1rem;bottom: 10rem;}
#cover{display:none;position:absolute;left:0;top:0;z-index:18888;background-color:#000000;opacity:0.7;}
#guide{display:none;position:absolute;top:0.1rem;z-index:19999;}
#guide img{width: 70%;height: auto;display: block;margin: 0 auto;margin-top: 0.2rem;}
</style>
<script type="text/javascript">
  //关注微信公众号二维码	 
function follow_wx()
{
	layer.open({
		type : 1,  
		title: '<span style="color:#F00">长按识别二维码</span>',
		content: '<img src="<?php echo $wx_qr; ?>" width="100%">',
		style: ''
	});
}
  
$(function(){
    $('.guide').show();
    return false;
	if(isWeiXin()){
		var subscribe = getCookie('subscribe'); // 是否已经关注了微信公众号
		if(subscribe == 0)
			$('.guide').show();
	}else{
		$('.guide').hide();
	}
})
 
</script> 

<!--微信关注提醒  end-->
<!-- 微信浏览器 调用微信 分享js  end--> 
<!--底部导航-end-->



<script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script> 
<script type="text/javascript" src="__STATIC__/js/sourch_submit.js"></script> 
<script type="text/javascript">
     //ajax_sourch_submit();
    /**
     * 继续加载推荐商品
     * */
    var before_request = 1; // 上一次请求是否已经有返回来, 有才可以进行下一次请求
    var page = 1;
    function ajax_sourch_submit(){
        if(before_request == 0)// 上一次请求没回来 不进行下一次请求
            return false;
        before_request = 0;
        page++;
        $.ajax({
            type : "get",
            url:"/index.php?m=Mobile&c=Index&a=ajaxGetMore&p="+page,
            success: function(data)
            {
                if(data){
                    $("#J_ItemList>ul").append(data);
                    before_request = 1;
                }else{
                    $('.get_more').hide();
                }
            }
        });
    }
	
	

	
	
</script>





</body>
</html>
