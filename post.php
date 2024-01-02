<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>
<div class="card p-4">
<div>作者：<?php $this->author(); ?></div>
<div>文章：<?php $this->title() ?></div>
<div><?php Postviews($this); ?></div>
<div>分类：<?php $this->category(','); ?></div>
<div>标签：<?php $this->tags(',', true, '无'); ?></div>
<div>发布：<?php $this->date('Y-m-d'); ?></div>
<hr>
<?php $this->content(); ?>
</div>
<?php $this->need('public/comments.php'); ?>
<?php $this->need('public/footer.php'); ?>