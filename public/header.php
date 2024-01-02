<!DOCTYPE HTML>
<html lang="zh">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <link rel="icon" type="image/png" href="<?php $this->options->favicon(); ?>">
    <link href="<?php $this->options->favicon(); ?>" rel="icon">
    <link rel="apple-touch-icon-precomposed" href="<?php $this->options->favicon(); ?>">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link href="https://cdn.staticfile.org/twitter-bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/twitter-bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
    <style type="text/css"><?php $this->options->CustomCSS(); ?></style>
    <style type="text/css">
      body {
          padding-top: 70px; 
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
      img{
          max-width: 100%;
          height: auto;
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
    </style>
    <?php $this->header(); ?>
</head>
<body>
<header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/"><?php $this->options->title(); ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" href="<?php $this->options->siteUrl() ?>" <?php if ($this->is('index')) : ?> class="nav-focus"<?php endif; ?>>首页</a>
          </li>
          <li class="nav-item">
              <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <li class="nav-item"><a class="nav-link active"  <?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
              <?php endwhile; ?>
          </li>
        </ul>
       
      </form>
      </div>
    </div>
  </nav>
</header>

<main>
<div class="container">
    
<div class="alert alert-success">
  <span style="font-size: 20px;">
        <?php if ($this->options->Notice): ?>
        <a style="color: #ff0000;" href="http://beian.miit.gov.cn" class="icpnum" target="_blank" rel="noreferrer">
            🍎<?php $this->options->Notice(); ?>
        </a>
        <?php endif; ?>
  </span>
</div>
