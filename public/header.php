<!DOCTYPE HTML>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php $this->options->favicon(); ?>">
    <link href="<?php $this->options->favicon(); ?>" rel="icon">
    <link rel="apple-touch-icon-precomposed" href="<?php $this->options->favicon(); ?>">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?><?php if($this->_currentPage>1) echo ' - 第 '.$this->_currentPage.' 页 '; ?></title>
    <!--<link href="https://img.zhuxu.asia/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://img.zhuxu.asia/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>-->
    <link href="<?php $this->options->themeUrl('/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php $this->options->themeUrl('/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/bootstrap-5.3.3-dist/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
    <style type="text/css"><?php $this->options->CustomCSS(); ?></style>
    <style type="text/css">
       body::before {
          z-index: -1;
          content: "";
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          /*opacity: 0.1;*/
          position: fixed;
          background: center/cover no-repeat;
          background-image: url(
          <?php if ($this->options->beijing): ?>
            <?php $this->options->beijing(); ?>
          <?php endif; ?>
          ); 
      }
      body {
          background-color: #e9e9e9;
          color: #000000;
          font-family: "Droid Serif",Georgia,"Times New Roman","PingFang SC","Hiragino Sans GB","Source Han Sans CN","WenQuanYi Micro Hei","Microsoft Yahei",serif;
      }
      body {
          padding-top: 70px; 
      }
      .logo-text {
          font-size: 1.25rem;
          font-weight: 600;
          line-height: 1;
          user-select: none;
      }
      li {
          list-style: none;
      }
      pre{
          padding: 1em;
          background-color: #dddddd;
      }
      table{
          border: 1px solid black; 
          border-collapse: collapse; 
          width: 100%; 
      }
      th,td{
          border: 1px solid black; 
          padding: 8px; 
          text-align: left;
      }
      th{
          background-color: #dddddd;
      }
      ::-webkit-scrollbar {
          width: 1px;
          height: 1px
      }
      ::-webkit-scrollbar-track {
          background-color: transparent;
          -webkit-border-radius: 2em;
          -moz-border-radius: 2em;
          border-radius: 2em
      }
      ::-webkit-scrollbar-thumb {
          background-color: #30B07F;
          background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.4) 100%,transparent 100%,transparent 50%,rgba(255,255,255,.4) 50%,rgba(255,255,255,.4) 75%,transparent 75%,transparent);
          -webkit-border-radius: 2em;
          -moz-border-radius: 2em;
          border-radius: 2em
      }
      #countdown{
          font-size: 20px;
      }
      .friends-ctx {
              display: flex;
    align-items: center;
    box-shadow: 0 0 #000, 0 0 #000, 0 1px 3px 0 #000000, 0 1px 2px -1px #000000;
    padding: 1rem 0.75rem;
    border-radius: var(--bs-border-radius);
    height: 6rem;
      }
    </style>
    <?php $this->header(); ?>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
    <div class="container">
      <a class="navbar-brand text-dark logo-text" href="/"><?php $this->options->title(); ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link text-dark" href="<?php $this->options->siteUrl() ?>" <?php if ($this->is('index')) : ?> class="nav-focus"<?php endif; ?>>首页</a>
          </li>
          <li class="nav-item">
              <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <li class="nav-item">
                    <a class="nav-link text-dark"
                      <?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?>
                    </a>
                </li>
              <?php endwhile; ?>
          </li>
        </ul>
        
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
          <input type="search" class="form-control" id="s" name="s" placeholder="<?php _e('输入关键字搜索'); ?>" aria-label="Search">
        </form>
        
        <div class="dropdown text-end">
          <?php if ($this->user->hasLogin()) : ?>
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear-fill"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" target="_blank" href="<?php $this->options->adminUrl("manage-posts.php"); ?>">管理文章</a></li>
            <li><a class="dropdown-item" target="_blank" href="<?php $this->options->adminUrl("manage-comments.php"); ?>">管理评论</a></li>
            <li><a class="dropdown-item" target="_blank" href="<?php $this->options->adminUrl(); ?>">进入后台</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php $this->options->logoutUrl(); ?>">退出登录</a></li>
          </ul>
          <?php else : ?>
          <div class="text-end">
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#myModal">登录</button>
            <?php if ($this->options->allowRegister) : ?>
            <a href="<?php $this->options->adminUrl('register.php'); ?>" type="button" class="btn btn-warning">注册</a>
          </div>
          <?php endif; ?>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </nav>
</header>

<main>


 <!-- 模态框 -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- 模态框头部 -->
      <div class="modal-header">
        <h4 class="modal-title">登录站点</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- 模态框内容 -->
      <div class="modal-body">
        <form action="<?php $this->options->loginAction()?>" method="post" name="login" rold="form">
          <input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>">
            <div class="mb-3 mt-3">
              <input class="form-control mt-3" type="text" name="name" autocomplete="username" placeholder="请输入用户名" required/>
            </div>
            <div class="mb-3 mt-3">
              <input class="form-control mt-3" type="password" name="password" autocomplete="current-password" placeholder="请输入密码" required/>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-check-label">
                <input<?php if(\Typecho\Cookie::get('__typecho_remember_remember')): ?> checked<?php endif; ?> type="checkbox" name="remember" class="checkbox" value="1" id="remember" /> <?php _e('下次自动登录'); ?>
                </label>
            </div>

          <button class="btn btn-primary" type="submit">登录</button>
        </form>
      </div>

      <!-- 模态框底部 -->
      <div class="modal-footer">
        这是一串不可复制的文字
      </div>

    </div>
  </div>
</div>