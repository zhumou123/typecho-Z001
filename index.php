<?php

/**
 * 一款基于 Typecho 博客的单栏主题
 * @package Z001
 * @author 朱某不爱说话
 * @version v1.0.2
 * @link https://blog.zhuxu.asia/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>
<div class="container">
  <div id="articles">
    <?php if ($this->options->Notice): ?>    
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php $this->options->Notice(); ?>
      </div>
    <?php endif; ?>
    <?php $this->need('public/article.php'); ?>
  </div>
  <?php $this->need('public/pagination.php'); ?>
</div>
<?php $this->need('public/footer.php'); ?>