<?php

/**
 * 友链
 * 
 * @package custom 
 * 
 **/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>

<div class="card p-4">
       <?php $this->content(); ?>
       <div id="link-list">
        <?php if (isset($this->options->plugins['activated']['Links'])) : ?>
            <?php
            Links_Plugin::output('
				<h5 style="">{name}: <a target="_blank" href="{url}" class="link-wrap">{url}</a></h5>
			', 0);
            ?>
        <?php endif; ?>
    </div>
</div>
<?php $this->need('public/comments.php'); ?>
<?php $this->need('public/footer.php'); ?>