<!DOCTYPE html>
<html>

<head>
  <meta content="yes" name="apple-mobile-web-app-capable">
  <meta content="yes" name="apple-touch-fullscreen">
  <meta content="telephone=no,email=no" name="format-detection">
  <title>首页</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css" rel="stylesheet">
  <script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.4/flexible.js"></script>
</head>

<body touchstart>
  <div class="myBalance">
    <a href="" class="rule">M豆规则？</a>
    <div class="balance">
      <p>120</p>
      <p>可用M豆</p>
    </div>
    <a href="" class="detail">查看明细</a>
  </div>
  <div id="topNav">
    <div class="swiper-wrapper">
      <div class="swiper-slide active">全部</div>
      <div class="swiper-slide">0-199</div>
      <div class="swiper-slide">200-499</div>
      <div class="swiper-slide">300-597</div>
      <div class="swiper-slide">500-799</div>
      <div class="swiper-slide">799-899</div>
    </div>
  </div>
  <article class="goodList">
    <div class="goodItem">
      <div class="imgBox">
        <img src="https://placeimg.com/350/350/people/grayscale" alt="">
      </div>
      <div class="info">
        <p class="title">标题标题标题标题标题标题标题标题标题标题标题标题</p>
        <p class="price">
          <span>500M豆</span>
          <em>￥289.00</em>
        </p>
        <a href="" class="exchange">立即兑换</a>
      </div>
    </div>
    <div class="goodItem">
      <div class="imgBox">
        <img src="https://placeimg.com/350/350/people/grayscale" alt="">
      </div>
      <div class="info">
        <p class="title">标题标题标题标题标题标题标题标题标题标题标题标题</p>
        <p class="price">
          <span>500M豆</span>
          <em>￥289.00</em>
        </p>
        <a href="" class="notenough">M豆不足</a>
      </div>
    </div>
    <div class="goodItem">
      <div class="imgBox">
        <img src="https://placeimg.com/350/350/people/grayscale" alt="">
      </div>
      <div class="info">
        <p class="title">标题标题标题标题标题标题标题标题标题标题标题标题</p>
        <p class="price">
          <span>500M豆</span>
          <em>￥289.00</em>
        </p>
        <a href="" class="notenough">M豆不足</a>
      </div>
    </div>
  </article>
  <div class="tabbar">
    <a href="" class="tabbar_item">
      <img src="images/time_picker.png" alt="" class="tabbar_icon">
      <p class="tabbar_title">首页</p>
    </a>
    <a href="" class="tabbar_item">
      <img src="images/time_picker.png" alt="" class="tabbar_icon">
      <p class="tabbar_title">首页</p>
    </a>
    <a href="" class="tabbar_item active">
      <img src="images/time_picker.png" alt="" class="tabbar_icon">
      <p class="tabbar_title">首页</p>
    </a>
  </div>
  <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
  <script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
  <script>
    var navTop = $('#topNav').offset().top;
    $(window).scroll(function () {
      var yheight = getScrollTop();
      if (yheight > navTop) {
        $("#topNav").addClass("fixNav")
      } else {
        $("#topNav").removeClass("fixNav");
      }
    })
    function getScrollTop() {
      var scrollPos;
      if (window.pageYOffset) {
        scrollPos = window.pageYOffset;
      }
      else if (document.compatMode && document.compatMode != 'BackCompat') { scrollPos = document.documentElement.scrollTop; }
      else if (document.body) { scrollPos = document.body.scrollTop; }
      return scrollPos;
    }

    var mySwiper = new Swiper('#topNav', {
      freeMode: true,
      slidesPerView: 'auto',
      freeModeSticky: true,
    });

    swiperWidth = mySwiper.container[0].clientWidth
    maxTranslate = mySwiper.maxTranslate();
    maxWidth = -maxTranslate + swiperWidth / 2

    $(".swiper-container").on('touchstart', function (e) {
      e.preventDefault()
    })

    mySwiper.on('tap', function (swiper, e) {
      slide = swiper.slides[swiper.clickedIndex]
      slideLeft = slide.offsetLeft
      slideWidth = slide.clientWidth
      slideCenter = slideLeft + slideWidth / 2
      // 被点击slide的中心点
      mySwiper.setWrapperTransition(300)
      if (slideCenter < swiperWidth / 2) {
        mySwiper.setWrapperTranslate(0)
      } else if (slideCenter > maxWidth) {
        mySwiper.setWrapperTranslate(maxTranslate)
      } else {
        nowTlanslate = slideCenter - swiperWidth / 2
        mySwiper.setWrapperTranslate(-nowTlanslate)
      }
      $("#topNav  .active").removeClass('active')
      $("#topNav .swiper-slide").eq(swiper.clickedIndex).addClass('active')
    })

  </script>
</body>

</html>