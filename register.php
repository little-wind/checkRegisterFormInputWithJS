<?php
  header("Content-type: text/html; charset=utf-8");

  if(isset($_GET['action']) AND $_GET['action'] == 'register') {
    $clean = array();
    $clean['username'] = _check_username($_POST['username']);
    $clean['password'] = _check_password($_POST['password'], $_POST['confirmPassword']);
    $clean['passworHint'] = _check_passwordHint($_POST['passwordHint']);
    $clean['passwordAnswer'] = _check_passwordAnswer($_POST['passwordHint'], $_POST['passwordAnswer']);
    $clean['email'] = _check_email($_POST['email']);
    $clean['qq'] = _check_qq($_POST['qq']);
    $clean['url'] = _check_url($_POST['url']);

    echo 'Hello~ ' . $clean['username'] . ', enjoy yourself!';
    echo '<br>';
    echo '<a href="index.php">返回注册页面</a>';
    exit();
  } else {
    _alert_back('页面数据有误！');
  }

  function _alert_back($_errorInfo) {
    //设置页面字符编码，防止生成乱码（ie8有这样的情况）
    header("Content-type: text/html; charset=utf-8");
    echo '<script type="text/javascript">alert(\'' . $_errorInfo .'\');history.back();</script>';
    exit();
  }

  function _check_username($_string, $_min = 2, $_max = 20) {
    //去除头尾空格
    $_string = trim($_string);

    //长度小于2位，或者大于20位
    if (mb_strlen($_string, 'utf-8') < $_min OR mb_strlen($_string, 'utf-8') > $_max) {
      _alert_back('用户名长度不符，不得小于' . $_min . '位，大于' . $_max . '位！请重新输入！');      
    }

    //限制敏感字符 
    $_char_pattern = '/[<>\'\"\ ]/'; 
    if(preg_match($_char_pattern, $_string)) { 
      _alert_back('用户名存在非法字符，请重新输入！'); 
    }

    //限制部分用户名 
    $_restrictedNames['0'] = '管理员'; 
    $_restrictedNames['1'] = 'admin'; 
    if (in_array($_string, $_restrictedNames)) { 
      _alert_back('该用户名已被限制注册，请重新输入！'); 
    }

    return $_string;
  }

  function _check_password($_password, $_confirmPassword, $_min = 6) {
    if(strlen($_password) < $_min) {
      _alert_back('密码不得少于'. $_min .'位！请重新输入！');
    }

    //验证密码、确认密码是否一致
    if($_password != $_confirmPassword) {
      _alert_back('2次输入的密码不一致！请重新输入！');
    }

    return sha1($_password);
  }

  function _check_passwordHint($_string, $_min = 4, $_max = 20) {
    $_string = trim($_string);

    if(mb_strlen($_string, 'utf-8') < $_min OR mb_strlen($_string, 'utf-8')> $_max) {
      _alert_back('密码提示长度不得小于' . $_min . '位，或大于' . $_max . '位！请重新输入！');
    }

    return $_string;
  }

  function _check_passwordAnswer($_passwordHint, $_passwordAnswer, $_min = 2, $_max = 20) {
    $_passwordHint = trim($_passwordHint);
    $_passwordAnswer = trim($_passwordAnswer);

    if(mb_strlen($_passwordAnswer, 'utf-8') < $_min OR mb_strlen($_passwordAnswer, 'utf-8') > $_max) {
      _alert_back('提示答案长度不得小于' . $_min . '位，或大于' . $_max . '位！请重新输入！');
    }

    if($_passwordHint == $_passwordAnswer) {
      _alert_back('密码提示和提示答案不能相同！请重新输入！');
    }

    return sha1($_passwordAnswer);
  }

  function _check_email($_email) {
    if(empty($_email)) {
      _alert_back('邮箱地址不能为空！');
    } else {
      $_email = trim($_email);

      $_atCount = mb_substr_count($_email, '@', 'utf-8');

      //@个数不为1，弹出错误提示
      if($_atCount != 1) {
        _alert_back('邮箱格式有误，请重新输入！');
      }

      //邮箱切割
      $_arr = explode('@', $_email, 2);
      $_username = $_arr[0];
      $_provider = $_arr[1];

      $_char_pattern = '/^[a-zA-z0-9][\.\-\w]{2,16}[a-zA-Z0-9]$/';
      if(!preg_match($_char_pattern, $_username)) {
        _alert_back('邮箱格式有误，请重新输入！');
      }

      $_provider_pattern = '/[\w\-\.]+(\.\w+)+/';
      if(!preg_match($_provider_pattern, $_provider)) {
        _alert_back('邮箱格式有误，请重新输入！');
      }

      return $_email;
    }
  }

  function _check_qq($_string) {
    if(empty($_string)) {
      _alert_back('qq不能为空！请重新输入！');
    } else {
      $_string = trim($_string);

      $_char_pattern = '/^[1-9]{1}[\d]{4,10}$/';

      if(!preg_match($_char_pattern, $_string)) {
        _alert_back('你输入的qq号码有误，请重新输入！');
      }

      return $_string;
    }
  }

  function _check_url($_string) {
    if(empty($_string)) {
      _alert_back('个人主页不能为空！请重新输入！');
    } else {
      $_string = trim($_string);

      $_char_pattern = '/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/';

      if(!preg_match($_char_pattern, $_string)) {
        _alert_back('网址格式有误，请重新输入！');
      }

      return $_string;
    }
  }
?>