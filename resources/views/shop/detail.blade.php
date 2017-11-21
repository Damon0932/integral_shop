<!DOCTYPE html>
<html>

<head>
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="yes" name="apple-touch-fullscreen">
	<meta content="telephone=no,email=no" name="format-detection">
	<title>详情</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css" rel="stylesheet">
	<script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.4/flexible.js"></script>
</head>

<body>
	<section class="goodDetails">
		<div class="goodSlide swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="//img13.360buyimg.com/n1/jfs/t712/314/624446879/645309/7f812e2f/54ca3870Nb0441463.jpg">
				</div>
				<div class="swiper-slide">
					<img src="//img13.360buyimg.com/n1/jfs/t712/314/624446879/645309/7f812e2f/54ca3870Nb0441463.jpg">
				</div>
				<div class="swiper-slide">
					<img src="//img13.360buyimg.com/n1/jfs/t712/314/624446879/645309/7f812e2f/54ca3870Nb0441463.jpg">
				</div>
				<div class="swiper-slide">
					<img src="//img13.360buyimg.com/n1/jfs/t712/314/624446879/645309/7f812e2f/54ca3870Nb0441463.jpg">
				</div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
		<div class="detailHeader">
			<p class="detail_title">标题标题标题标题标题标题标题标题标题标题标题标题</p>
			<p class="detail_price">100M豆<span>￥198.00</span></p>
			<div class="detail_params">
				<span class="speci">规格：500g</span>
				<span class="sales">已售：1000</span>
			</div>
		</div>
		<div class="detailImg">
			<div class="detail_header"><i class="iconfont icon-image"></i>图文详情</div>
			<div class="img_list">
					<img class="init_pic" src="//img30.360buyimg.com/popWaterMark/jfs/t7567/26/3015196551/614399/3f95d777/59b8df0aNd29ddcd3.jpg" alt="">
					<img class="init_pic" src="//img30.360buyimg.com/popWaterMark/jfs/t8728/345/1373510053/140865/d7072842/59b8df0dN977ef09e.jpg" alt="">
					<img class="init_pic" src="//img30.360buyimg.com/popWaterMark/jfs/t9442/77/1396075188/395994/ec41329a/59b8df0aN43603992.jpg" alt="">
					<img class="init_pic" src="//img30.360buyimg.com/popWaterMark/jfs/t9154/128/1358302220/184100/6d35f786/59b8df11N6ba3113f.jpg" alt="">
					<img class="init_pic" src="//img30.360buyimg.com/popWaterMark/jfs/t8050/68/1425726952/1496053/80f45bab/59b8df25N47623c11.jpg" alt="">
			</div>
		</div>
	</section>
	<div class="exchangeBox">
		<a href="" class="exchange_btn">立即兑换</a><!-- 添加class:disabled M豆不足 -->
	</div>
	<script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
	<script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
	<script>
		var mySwiper = new Swiper ('.swiper-container', {
        pagination: '.swiper-pagination',
    })
	</script>
</body>

</html>