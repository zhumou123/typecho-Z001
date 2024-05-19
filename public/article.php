<?php if ($this->options->articleStyle == 0): ?>
  <?php while ($this->next()): ?>
     <div class="card" style="margin-top: 15px;">
       <div class="card-body">
          <div><?php $this->date(); ?></div>
          <h4 class="card-title"><?php $this->title() ?></h4>
          <p class="card-text"><?php $this->excerpt(20, '...'); ?></p>
          <a href="<?php $this->permalink() ?>" class="card-link">阅读全文</a>
       </div>
     </div>
  <?php endwhile; ?>
<?php endif; ?>