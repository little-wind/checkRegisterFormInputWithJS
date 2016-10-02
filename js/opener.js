function _opener(src) {
  //opener表示父窗口
  //.document表示文档
  var faceImg = opener.document.getElementById('faceImg');
  faceImg.src = src;
}