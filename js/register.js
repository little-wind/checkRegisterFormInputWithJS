window.onload = function() {
  var faceImg = document.getElementById('faceImg');
  faceImg.onclick = function() {
    window.open('face.php', 'face', 'width=430, height=400, top=0, left=0, scrollbars=1');
  }

  //注册表单验证
  var registerForm = document.getElementsByTagName('form')[0];

  registerForm.onsubmit = function() {
    //用户名验证
    if(registerForm.username.value.length < 2 || registerForm.username.value.length > 20) {
      alert('用户名不得小于2位或者大于20位！');
      registerForm.username.value = '';
      registerForm.username.focus();
      return false;
    }
    if(/[<>\'\"\ \　]/.test(registerForm.username.value)) {
      alert('用户名包含非法字符！');
      registerForm.username.username = '';
      registerForm.username.focus();
      return false;
    }

    //密码验证
    if(registerForm.password.value.length < 6) {
      alert('用户密码不得小于6位！');
      registerForm.password.value = '';
      registerForm.password.focus();
      return false;
    }
    if(registerForm.password.value != registerForm.confirmPassword.value) {
      alert('密码和确认密码不一致！');
      registerForm.confirmPassword.value = '';
      registerForm.confirmPassword.focus();
      return false;
    }

    //密码提示和提示答案
    if(registerForm.passwordHint.value.length < 2 || registerForm.passwordHint.value.length > 20) {
      alert('密码提示不得小于2位或大于20位！');
      registerForm.passwordHint.value = '';
      registerForm.passwordHint.focus();
      return false;
    }
    if(registerForm.passwordAnswer.value.length < 2 || registerForm.passwordAnswer.value.length > 20) {
      alert('提示答案不得小于2位或大于20位！');
      registerForm.passwordAnswer.value = '';
      registerForm.passwordAnswer.focus();
      return false;
    }
    if(registerForm.passwordAnswer.value == registerForm.passwordHint.value) {
      alert('提示答案与密码提示不得一致！');
      registerForm.passwordAnswer.value = '';
      registerForm.passwordAnswer.focus();
      return false;
    }

    

    //邮箱验证
    if(!/^[a-zA-z0-9][\.\-\w]{2,16}[a-zA-Z0-9]+@[\w\-\.]+(\.\w+)+$/.test(registerForm.email.value)) {
      alert('邮箱格式不正确！');
      registerForm.email.value = '';
      registerForm.email.focus();
      return false;
    }
    
    //qq验证
    if(!/^[1-9]{1}[\d]{4,10}$/.test(registerForm.qq.value)) {
      alert('qq号码不正确！');
      registerForm.qq.value = '';
      registerForm.qq.focus();
      return false;
    }

    //个人主页验证
    if(!/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(registerForm.url.value)) {
      alert('个人网址不合法！');
      registerForm.url.value = '';
      registerForm.url.focus();
      return false;
    }

    return true;
  };
};