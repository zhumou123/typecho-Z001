<div class="row mb-2">
    <?php if ($this->options->articleStyle == 0): ?>
    <?php while ($this->next()): ?>
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static"> <strong class="d-inline-block mb-2 text-primary-emphasis"><?php $this->date('Y-m-d'); ?></strong>
                <h3 class"mb-0"><?php $this->title() ?></h3>
                <div class="mb-1 text-body-secondary">
                    <?php $this->category(','); ?></div>
                <p class="card-text mb-auto">文章摘要，开发中...</p>
                <a href="<?php $this->permalink() ?>" class="icon-link gap-1 icon-link-hover stretched-link"></a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>