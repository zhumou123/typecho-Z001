<footer class="py-5 text-center text-body-secondary">
 <div class="item">
    <?php if ($this->options->ICPbeian): ?>
        <a href="http://beian.miit.gov.cn" class="icpnum" target="_blank" rel="noreferrer">
            <?php $this->options->ICPbeian(); ?>
        </a>
    <?php endif; ?>
 </div>
 <div class="item">
     <span class="right"><?php echo $this->options->buildYear . " - " . date("Y"); ?> &copy <?php $this->options->title(); ?></span>
 </div>
 <div class="item">
      本站由<a target="_blank" href="https://typecho.org/"> Typecho </a>强力驱动丨并搭配<a href="https://blog.zhuxu.xyz/"> Z001 </a>主题使用
 </div>
</footer>

</div>
</div>
<?php $this->footer(); ?>
<?php if ($this->options->CustomContent): $this->options->CustomContent(); ?>
<?php endif; ?>
</body>

</html>