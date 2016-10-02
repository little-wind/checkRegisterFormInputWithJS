<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>注册表单数据验证</title>
  <link rel="stylesheet" href="css/register.css">
  <script src="js/register.js"></script>
</head>
<body>
  <div id="register">
    <h2>会员注册</h2>
    <form class="register-form" action="register.php?action=register" method="post" name="register">
      <h3>请认真填写以下资料</h3>

      <label for="username">
        <span>用户名：</span>
        <input id="username" type="text" name="username" autofocus="" placehoder="用户名">
      </label>

      <label for="password">
        <span>密码；</span>
        <input id="password" type="password" name="password" placeholder="登录密码">
      </label>

      <label for="confirmPassword">
        <span>确认密码：</span>
        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="确认密码">
      </label>

      <label for="passwordHint">
        <span>密码提示：</span>
        <input id="passwordHint" type="text" name="passwordHint">
      </label>

      <label for="passwordAnswer">
        <span>提示答案：</span>
        <input id="passwordAnswer" type="text" name="passwordAnswer" placeholder="填写出密码提示的问题答案">
      </label>

      <label>
        <span>性别：</span>
        <input type="radio" name="sex" value="男" checked="checked">男  <input type="radio" name="sex" value="女">女
      </label>

      <label>
        <span>头像：</span>
        <input id="face" type="hidden" name="face" value="face/m01.gif">
        <img id="faceImg" src="face/m01.gif" alt="头像图片">
      </label>

      <label for="email">
        <span>电子邮件：</span>
        <input id="email" type="email" name="email" placeholder="电子邮件">
      </label>

      <label for="qq">
        <span>QQ号码：</span>
        <input id="qq" type="text" name="qq" placeholder="qq号码">
      </label>

      <label for="url">
        <span>个人主页：</span>
        <input id="url" type="text" name="url" placeholder="个人主页" value="http://">
      </label>

      <label>
        <span>&nbsp;</span>
        <input class="button" type="submit" value="注册">
      </label>
    </form>
  </div>
</body>
</html>