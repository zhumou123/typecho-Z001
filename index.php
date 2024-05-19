<?php

/**
 * 一款基于 Typecho 博客的单栏主题
 * @package Z001
 * @author 朱某不爱说话
 * @version v1.0.1
 * @link https://blog.zhuxu.asia/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>
<div class="container">
  <div id="articles">
    <?php if ($this->options->Notice): ?>    
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button aria-label="关闭" type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?php $this->options->Notice(); ?>
      </div>
    <?php endif; ?>
      
    <?php $this->need('public/article.php'); ?>
  </div>
  <div class="text-center" style="margin-top: 15px;">
    <nav>
    <?php
      ob_start(); 
      $this->pageNav('&laquo;','&raquo;', 1, '', array('wrapTag' => 'ul', 'wrapClass' => 'pagination pagination-rounded mb-0 justify-content-center', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'active', 'prevClass' => 'prev', 'nextClass' => 'next'));
      $content = ob_get_contents();
      ob_end_clean();
      $content = preg_replace("/<li><span>(.*?)<\/span><\/li>/sm", '', $content);
      $content = preg_replace("/<li [class=\"active\"]+>(.*?)<\/li>/sm", '<li class="page-item active">$1</li>', $content);
      $content = preg_replace("/<li [class=\"prev\"]+>(.*?)<\/li>/sm", '<li class="page-item">$1</li>', $content);
      $content = preg_replace("/<li [class=\"next\"]+>(.*?)<\/li>/sm", '<li class="page-item">$1</li>', $content);
      $content = preg_replace("/<li>(.*?)<\/li>/sm", '<li class="page-item">$1</li>', $content);
      $content = preg_replace("/<a href=\"(.*?)\">(.*?)<\/a>/sm", '<a class="page-link" href="$1">$2</a>', $content);
      echo $content;
     ?>
  </nav> 
  </div>
  <?php $this->need('public/aside.php'); ?>
</div>
<?php $this->need('public/footer.php'); ?>