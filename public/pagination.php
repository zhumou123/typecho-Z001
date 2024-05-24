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