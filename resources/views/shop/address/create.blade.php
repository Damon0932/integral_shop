<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="yes" name="apple-mobile-web-app-capable">
  <meta content="yes" name="apple-touch-fullscreen">
  <meta content="telephone=no,email=no" name="format-detection">
  <title>新增地址</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.4/flexible.js"></script>
</head>

<body>
  <header class="header">
    <div class="goback">
      <a href="javascript:;"></a>
    </div>
    <div class="title">新增地址</div>
  </header>
  <div class="editAddress">
    <form action="">
      <dl>
        <dt>名字</dt>
        <dd>
          <input type="text" placeholder="请输入">
        </dd>
      </dl>
      <dl>
          <dt>电话</dt>
          <dd>
            <input type="text" placeholder="请输入">
          </dd>
        </dl>
      <dl>
        <dt>省份</dt>
        <dd>
          <label>
            <select name="" id="">
              <option value="">请选择</option>
            </select>
          </label>
        </dd>
      </dl>
      <dl>
          <dt>城市</dt>
          <dd>
            <label>
              <select name="" id="">
                <option value="">请选择</option>
              </select>
            </label>
          </dd>
        </dl>
        <dl>
            <dt>区县</dt>
            <dd>
              <label>
                <select name="" id="">
                  <option value="">请选择</option>
                </select>
              </label>
            </dd>
          </dl>
      <dl>
        <dt>地址</dt>
        <dd><input type="text" placeholder="请输入详细地址"></dd>
      </dl>
      <dl>
        <dt>邮编</dt>
        <dd><input type="number" placeholder="请输入"></dd>
      </dl>
    </form>
    <div class="submit">
        <button>添加</button>
      </div>
  </div>

  <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
</body>

</html>