// myScript.js

// 監聽連結的點擊事件
document.addEventListener('click', function(event) {
  var target = event.target;

  // 確認點擊的元素是<a>標籤
  if (target.tagName === 'A') {
    event.preventDefault(); // 阻止默認的連結行為

    var url = target.getAttribute('href'); // 獲取連結的目標URL

    // 使用pushState()方法修改URL，不刷新頁面
    history.pushState(null, null, url);

    // 根據目標URL顯示相應的內容
    fetchContent(url);
  }
});

// 根據URL顯示相應的內容
function fetchContent(url) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var content = xhr.responseText;
      // 將內容插入到頁面主體區域
      document.getElementById('main-content').innerHTML = content;
    }
  };
  xhr.send();
}

// 初始化時根據當前URL顯示相應的內容
fetchContent(window.location.href);
