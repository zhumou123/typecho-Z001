<?php
/* 获取主题当前版本号 */
function _getVersion()
{
  return "v1.0.2";
};

/*<div class="agent"><?php _getAgentOS($comments->agent); ?> · <?php _getAgentBrowser($comments->agent); ?></div>*/
/* 判断是否是手机 */
function _isMobile()
{
  if (isset($_SERVER['HTTP_X_WAP_PROFILE']))
    return true;
  if (isset($_SERVER['HTTP_VIA'])) {
    return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
  }
  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
    if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
      return true;
  }
  if (isset($_SERVER['HTTP_ACCEPT'])) {
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
      return true;
    }
  }
  return false;
}

/* 根据评论agent获取浏览器类型 */
function _getAgentBrowser($agent)
{
  if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
    $outputer = 'Internet Explore';
  } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
    $outputer = 'FireFox';
  } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
    $outputer = 'MicroSoft Edge';
  } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
    $outputer = '360 Fast Browser';
  } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
    $outputer = 'MicroSoft Edge';
  } else if (preg_match('/UC/i', $agent)) {
    $outputer = 'UC Browser';
  } else if (preg_match('/QQ/i', $agent, $regs) || preg_match('/QQ Browser\/([^\s]+)/i', $agent, $regs)) {
    $outputer = 'QQ Browser';
  } else if (preg_match('/UBrowser/i', $agent, $regs)) {
    $outputer = 'UC Browser';
  } else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
    $outputer = 'Opera';
  } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
    $outputer = 'Google Chrome';
  } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
    $outputer = 'Safari';
  } else {
    $outputer = 'Google Chrome';
  }
  echo $outputer;
}

/* 根据评论agent获取设备类型 */
function _getAgentOS($agent)
{
  $os = "Linux";
  if (preg_match('/win/i', $agent)) {
    if (preg_match('/nt 6.0/i', $agent)) {
      $os = 'Windows Vista';
    } else if (preg_match('/nt 6.1/i', $agent)) {
      $os = 'Windows 7';
    } else if (preg_match('/nt 6.2/i', $agent)) {
      $os = 'Windows 8';
    } else if (preg_match('/nt 6.3/i', $agent)) {
      $os = 'Windows 8.1';
    } else if (preg_match('/nt 5.1/i', $agent)) {
      $os = 'Windows XP';
    } else if (preg_match('/nt 10.0/i', $agent)) {
      $os = 'Windows 10';
    } else {
      $os = 'Windows X64';
    }
  } else if (preg_match('/android/i', $agent)) {
    if (preg_match('/android 9/i', $agent)) {
      $os = 'Android Pie';
    } else if (preg_match('/android 8/i', $agent)) {
      $os = 'Android Oreo';
    } else {
      $os = 'Android';
    }
  } else if (preg_match('/ubuntu/i', $agent)) {
    $os = 'Ubuntu';
  } else if (preg_match('/linux/i', $agent)) {
    $os = 'Linux';
  } else if (preg_match('/iPhone/i', $agent)) {
    $os = 'iPhone';
  } else if (preg_match('/mac/i', $agent)) {
    $os = 'MacOS';
  } else if (preg_match('/fusion/i', $agent)) {
    $os = 'Android';
  } else {
    $os = 'Linux';
  }
  echo $os;
}

/* 获取全局懒加载图 */
function _getLazyload($type = true)
{
  if ($type) echo Helper::options()->JLazyload;
  else return Helper::options()->JLazyload;
}

/* 通过邮箱生成头像地址 */
function _getAvatarByMail($mail)
{
  $gravatarsUrl = Helper::options()->JCustomAvatarSource ? Helper::options()->JCustomAvatarSource : 'https://gravatar.helingqi.com/wavatar/';
  $mailLower = strtolower($mail);
  $md5MailLower = md5($mailLower);
  $qqMail = str_replace('@qq.com', '', $mailLower);
  if (strstr($mailLower, "qq.com") && is_numeric($qqMail) && strlen($qqMail) < 11 && strlen($qqMail) > 4) {
    echo 'https://thirdqq.qlogo.cn/g?b=qq&nk=' . $qqMail . '&s=100';
  } else {
    echo $gravatarsUrl . $md5MailLower . '?d=mm';
  }
};

function themeInit($archive)
{
// 强制用户文章最新评论显示在文章首页
 Helper::options()->commentsPageDisplay = 'first';
// 将较新的评论显示在前面
 Helper::options()->commentsOrder= 'DESC';
// 突破评论回复楼层限制
 Helper::options()->commentsMaxNestingLevels = 999;
}
function get_comment_at($coid)
{//评论@函数
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ?', $coid));
    $parent = $prow['parent'];
    if (!empty($parent)) {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
if(!empty($arow['author'])){ $author = $arow['author'];
        $href   = '<a href="#comment-' . $parent . '">@' . $author . '</a> ';
        return $href;
}else { return '';}
    } else {
        return '';
    }
}

function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')->page(1,1)))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}