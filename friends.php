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
<div class="container">
<div class="card p-4">
  <?php $this->content(); ?>
  
   <div class="row mb-4 ">
  <?php if (isset($this->options->plugins['activated']['Links'])) : ?>
            <?php
            Links_Plugin::output('
           
              <div class="col-md-4 col-sm-6 position-relative">
                  <a class="friends-card stretched-link" href="{url}" target="_blank" title="{description}"></a>
                  <div class="friends-ctx">
                  <a data-fslightbox="" data-type="image" data-id="lightbox" href="{image}"><img 
                  style="
    border-radius: 999px;
    width: 3.5rem;
    height: 3.5rem;
    opacity: 0;
    -webkit-transition: .8s ease-in-out opacity;
    transition: .8s ease-in-out opacity;
    filter: blur(35px);
    filter: blur(0);
    opacity: 1;
    transition: .5s filter linear,.5s -webkit-filter linear;
    max-width: 100%;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    border: 0;
    vertical-align: middle;
    margin: 1.25rem auto;.typography
    img {
    max-width: 100%;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    border: 0;
    vertical-align: middle;
    margin: 1.25rem auto;
};
.typography
    img {
    max-width: 100%;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    border: 0;
    vertical-align: middle;
    margin: 1.25rem auto;
};
"
                  class="friends-img lazy entered loaded" data-="" data-src="{image}" data-ll-status="loaded" src="{image}"></a>
                  <div class="ms-2">
                  <div class="fw-bold fs-6 line-clamp-1 mb-2">{name}</div>
                  <div class="friends-text text-xs line-clamp-2">{description}</div></div></div>
              </div>
            
				
			', 0);
            ?>
        <?php endif; ?>
  </div>
  </div>
  <?php $this->need('public/aside.php'); ?>
</div>

<?php $this->need('public/footer.php'); ?>