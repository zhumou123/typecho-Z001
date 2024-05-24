<style type="text/css">
    @media (min-width: 768px){
    .inputgrap {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 1rem;
    }
</style>

<?php $this->comments()->to($comments); ?>

<div class="card p-4" style="margin-top:15px">
  <?php if ($this->hidden) : ?>
      <span>当前文章受密码保护，无法评论</span>
  <?php else : ?>
    <?php if ($this->allow('comment') && $this->options->JCommentStatus !== "off") : ?>
    
      <h3 style="font-size: 18px;font-weight: bold;"><?php _e('添加新评论'); ?></h3>    
      <div id="<?php $this->respondId(); ?>">
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
          <div class="inputgrap">
            <p>    
                <label for="author" style="color: #3F51B5;font-size: small;"><?php _e('称呼'); ?></label>
                <input class="form-control" type="text" name="author" id="author" class="text" value="<?php $this->user->hasLogin() ? $this->user->screenName() : $this->remember('author') ?>"autocomplete="off" maxlength="16" required/>
              </p>
            <p>
                <label style="color: #3F51B5;font-size: small;" for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
                <input class="form-control" type="email" name="mail" id="mail" class="text" value="<?php $this->user->hasLogin() ? $this->user->mail() : $this->remember('mail') ?>"<?php if ($this->options->commentsRequireMail): ?> autocomplete="off" required<?php endif; ?> />
              </p>
            <p>
                <label style="color: #3F51B5;font-size: small;" for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网址'); ?></label>
                <input class="form-control" type="url" name="url" id="url" autocomplete="off" class="text" placeholder="<?php _e('https://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
              </p>
          </div>
          <div class="mb-3">
            <label style="color: #3F51B5;font-size: small;" for="textarea" class="required"><?php _e('内容'); ?></label>
            <textarea class="form-control" rows="8" cols="50" name="text" id="textarea" class="textarea" placeholder="善语结善缘，恶语伤人心..."required><?php $this->remember('text'); ?></textarea>
          </div>
          <div class="foot">
            <div class="submit">
              <button class="btn btn-outline-secondary btn-sm" type="submit"style="float: right;">发送评论</button>
            </div>
          </div>
        </form>
      </div>
    
      <?php if ($comments->have()) : ?>
        <?php $comments->listComments(); ?>
        <?php
        $comments->pageNav(
          '<svg class="icon icon-prev" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>',
          '<svg class="icon icon-next" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>',
          1,
          '...',
          array(
            'wrapTag' => 'ul',
            'wrapClass' => 'Z001_pagination',
            'itemTag' => 'li',
            'textTag' => 'a',
            'currentClass' => 'active',
            'prevClass' => 'prev',
            'nextClass' => 'next'
          )
        );
        ?>
      <?php endif; ?>
      
    <?php else : ?>
      <?php if ($this->options->JCommentStatus === "off") : ?>
      <span>博主关闭了所有页面的评论</span>
      <?php else : ?>
      <span>博主关闭了当前页面的评论</span>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>
</div>