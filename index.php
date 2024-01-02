<?php

/**
 * 一款基于 Typecho 博客的单栏主题
 * @package Z001
 * @author 朱某不爱说话
 * @version v1.0.0
 * @link https://blog.zhuxu.xyz/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>
<div id="container">
  <div id="articles">
    <?php $this->need('public/article.php'); ?>
  </div>
  <div class="text-center">
    <?php $this->pageLink('上一页', 'prev'); ?>
    <?php $this->pageLink('下一页', 'next'); ?>
  </div>
</div>
<?php $this->need('public/footer.php'); ?>