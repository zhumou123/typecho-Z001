<footer class="py-3 bg-light text-center text-body-secondary" style="margin-top: 15px;">
    <div class="container">
      <p class="text-center text-muted">
        <div class="item">
          <span class="right"><?php echo $this->options->buildYear . " - " . date("Y"); ?> &copy <?php $this->options->title(); ?></span>
        </div>
        <div class="item">
          <?php if ($this->options->ICPbeian): ?>
            <a href="http://beian.miit.gov.cn" class="icpnum" target="_blank" rel="noreferrer"><?php $this->options->ICPbeian(); ?></a>
          <?php endif; ?>
        </div>
        <div class="item">
          <?php if ($this->options->gonganbeian): ?>
            <img src="https://img.zhuxu.asia/img/%E5%A4%87%E6%A1%88%E5%9B%BE%E6%A0%87.png" alt="drawing of a cat" class="el-image__inner" width="15" height="15">
            <a href="https://beian.mps.gov.cn/#/query/webSearch" class="icpnum" target="_blank" rel="noreferrer"><?php $this->options->gonganbeian(); ?></a>
          <?php endif; ?>
        </div>
        <div class="item">
           本站由<a target="_blank" href="https://typecho.org/"> Typecho </a>强力驱动丨并搭配<a href="https://gitee.com/zhuxucy/typecho-Z001"> Z001 </a>主题使用
        </div>
      </p>
    </div>
</footer>

</div>
</div>
<?php $this->footer(); ?>
<?php if ($this->options->CustomContent): $this->options->CustomContent(); ?>
<?php endif; ?>
</body>

</html>