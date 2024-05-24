<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>
<div class="container">
<div class="card p-4">
<div class="CENTER"><span id="DM_tips">错误提示</span></div>
<div class="error" id="DM_error">您访问的页面找不到或已被删除了</div>
<div class="VIDEO">
    <video controls="controls" poster="https://cdn.inis.cc/comm/assets/images/bg/3.jpg" playsinline="true" width="100%" preload="none" webkit-playsinline="true" src="//kpi.21lhz.cn/video/outer/18.mp4" id="player"></video>
</div>
<div class="footer">—— 邀您共赏视频 ——</div>
</div>
</div>

<?php $this->need('public/footer.php'); ?>
