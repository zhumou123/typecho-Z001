<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>
<div class="container">
<div class="card p-4">
  <div class="joe_archive__title-title">
    <span>搜索到</span>
    <span class="muted"><?php echo $this->getTotal(); ?></span>
    <span>篇&nbsp;</span>
    <?php
      $sp='<span class="muted ellipsis"> %s </span>';
      $this->archiveTitle(array(
      'category' => '分类为'.$sp.'的文章',
      'search' => '包含关键字'.$sp.'的文章',
      'tag' => '标签为'.$sp.'的文章',
      'author' => $sp.'发布的文章')
      , '', '');
    ?>
  </div>
</div>

<?php if ($this->options->articleStyle == 0): ?>
  <?php while ($this->next()): ?>
     <div class="card" style="margin-top: 15px;">
       <div class="card-body">
          <h6><?php $this->date(); ?></h6>
          <h4 class="card-title"><?php $this->title() ?></h4>
          <p class="card-text"><?php $this->excerpt(20, '...'); ?></p>
          <a href="<?php $this->permalink() ?>" class="card-link">阅读全文</a>
       </div>
     </div>
  <?php endwhile; ?>
<?php endif; ?>
<?php $this->need('public/aside.php'); ?>
</div>

<?php $this->need('public/footer.php'); ?>