<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- 模态框头部 -->
      <div class="modal-header">
        <h4 class="modal-title">登录/注册</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- 模态框内容 -->
      <div class="modal-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">登录</button>
            <?php if ($this->options->allowRegister) : ?>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">注册</button>
            <?php endif; ?>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
           <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
             <form action="<?php $this->options->loginAction()?>" method="post" name="login" rold="form">
               <input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>">
                 <div class="mb-3 mt-3">
                   用户名：<input class="form-control mt-3" type="text" name="name" autocomplete="username" required/>
                 </div>
                 <div class="mb-3 mt-3">
                   密码：<input class="form-control mt-3" type="password" name="password" autocomplete="current-password" required/>
                 </div>
                 <div class="mb-3 mt-3">
                   <label class="form-check-label">
                   <input<?php if(\Typecho\Cookie::get('__typecho_remember_remember')): ?> checked<?php endif; ?> type="checkbox" name="remember" class="checkbox" value="1" id="remember" /> <?php _e('下次自动登录'); ?>
                   </label>
                 </div>
                 <div class="d-grid">
                   <button type="submit" class="btn btn-primary btn-block">登录</button>
                 </div>
             </form>
           </div>
           <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
             <form action="<?php $this->options->registerAction();?>" method="post" name="register" role="form">
             <input type="hidden" name="_" value="<?php echo $this->security->getToken($this->request->getRequestUrl());?>">
               <div class="mb-3 mt-3">
                 用户名：<input class="form-control mt-3" type="text" name="name">
               </div>
               <div class="mb-3 mt-3">
                 邮箱：<input class="form-control mt-3" type="email" id="mail" name="mail" >
               </div>
               <div class="mb-3 mt-3">
                 密码：<input class="form-control mt-3" type="password" id="password" name="password" class="text-l w-100" autofocus />
               </div>
               <div class="mb-3 mt-3">
                 重复密码：<input class="form-control mt-3" type="password" id="confirm" name="confirm" class="text-l w-100" />
               </div>
               <div class="mb-3 mt-3 d-grid">
                 <button class="btn btn-primary btn-block" type="submit" name="loginsubmit" value="true">注册</button>
               </div>
           </form>
           </div>
        </div>  
      </div>
    </div>
  </div>
</div>