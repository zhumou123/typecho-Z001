<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>
<div class="container">
<div class="card p-4">
<div><?php $this->content(); ?></div>
</div>
<?php $this->need('public/aside.php'); ?>
</div>

<?php $this->need('public/footer.php'); ?>
