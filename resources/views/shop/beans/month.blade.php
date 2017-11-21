<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="yes" name="apple-mobile-web-app-capable">
  <meta content="yes" name="apple-touch-fullscreen">
  <meta content="telephone=no,email=no" name="format-detection">
  <title>记录</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.4/flexible.js"></script>
</head>

<body>
  <header class="header">
    <div class="goback">
      <a href="javascript:;"></a>
    </div>
    <div class="title">我的M豆</div>
  </header>
  <div class="integral_info">
    <div class="date">2017年11月</div>
    <p class="info">转入：+800 兑换：-300</p>
    <span class="select_time">
      <img src="images/time_picker.png" id="date-selector" alt="">
    </span>
  </div>
  <div class="integral_list">
    <div class="integral_item">
      <a href="">
        <h4 class="title">微信红包</h4>
        <p class="time">2017-01-28 17:25:10</p>
        <p class="sum income">+ 2.88</p>
      </a>
    </div>
    <div class="integral_item">
      <a href="">
        <h4 class="title">微信红包</h4>
        <p class="time">2017-01-28 17:25:10</p>
        <p class="sum">- 2.88</p>
      </a>
    </div>
  </div>
  <div id="targetContainer"></div>
  <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
  <script src="js/DataSelector.js"></script>
   <script>
      new DateSelector({
       input: 'date-selector',//点击触发插件的input框的id
       container: 'targetContainer',//插件插入的容器id
       type: 0,
       param: [1, 1, 0, 0, 0],
       //设置['year','month','day','hour','minute'],1为需要，0为不需要,需要连续的1
       beginTime: [2011, 1],//如空数组默认设置成1970年1月1日0时0分开始，如需要设置开始时间点，数组的值对应param参数的对应值。
       endTime: [],//如空数组默认设置成次年12月31日23时59分结束，如需要设置结束时间点，数组的值对应param参数的对应值。
       recentTime: [],//如不需要设置当前时间，被为空数组，如需要设置的开始的时间点，数组的值对应param参数的对应值。
       success: function (arr) {
         console.log(arr);
         //ajax
       }//回调
     });
   </script>
</body>

</html>