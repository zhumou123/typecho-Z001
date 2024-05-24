<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/* Z001核心文件 */
require_once("core/function.php");

function themeConfig($form)
{

    echo "<h2>Z001 主题设置</h2>";

    $str1 = explode('/themes/', Helper::options()->themeUrl);
    $str2 = explode('/', $str1[1]);
    $name=$str2[0];//获取到模板文件夹名字也就是模板在数据库中的名字
    $db = Typecho_Db::get();
    $sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:'.$name));
    $ysj = $sjdq['value'];
    if(isset($_POST['type']))
    { 
    if($_POST["type"]=="备份模板设置数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:'.$name.'bf'))){
    $update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:'.$name.'bf');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi col-mb-12 home">备份已更新，请等待自动刷新！如果等不到请点击';
    ?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    if($ysj){
     $insert = $db->insert('table.options')
    ->rows(array('name' => 'theme:'.$name.'bf','user' => '0','value' => $ysj));
     $insertId = $db->query($insert);
    echo '<div class="tongzhi col-mb-12 home">备份完成，请等待自动刷新！如果等不到请点击';
    ?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }
    }
        }
    if($_POST["type"]=="还原模板设置数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:'.$name.'bf'))){
    $sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:'.$name.'bf'));
    $bsj = $sjdub['value'];
    $update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:'.$name);
    $updateRows= $db->query($update);
    echo '<div class="tongzhi col-mb-12 home">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
    ?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
    <?php
    }else{
    echo '<div class="tongzhi col-mb-12 home">没有模板备份数据，恢复不了哦！</div>';
    }
    }
    if($_POST["type"]=="删除备份数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:'.$name.'bf'))){
    $delete = $db->delete('table.options')->where ('name = ?', 'theme:'.$name.'bf');
    $deletedRows = $db->query($delete);
    echo '<div class="tongzhi col-mb-12 home">删除成功，请等待自动刷新，如果等不到请点击';
    ?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    echo '<div class="tongzhi col-mb-12 home">不用删了！备份不存在！！！</div>';
    }
    }
    }
    echo '<form action="?'.$name.'bf" method="post">
    <input type="submit" name="type" class="btn btn-s" value="备份模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form>';
    
    //下方为模板设置，上方为备份 
    //下方为模板设置，上方为备份 
    
    $JCommentStatus = new Typecho_Widget_Helper_Form_Element_Select(
    'JCommentStatus',
    array(
      'on' => '开启（默认）',
      'off' => '关闭'
    ),
    '3',
    '开启或关闭全站评论',
    '介绍：用于一键开启关闭所有页面的评论 <br>
         注意：此处的权重优先级最高 <br>
         若关闭此项而文章内开启评论，评论依旧为关闭状态'
    );
    $form->addInput($JCommentStatus->multiMode());
    /* --------------------------------------- */
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', null, null, _t('站点标题 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO  支持Base64 地址'));
    $form->addInput($favicon);
    /* --------------------------------------- */
    $beijing = new Typecho_Widget_Helper_Form_Element_Text('beijing', NULL, NULL, _t('网站背景'), _t('在这里输入背景链接,留空则不显示 支持Base64 地址'));
	$form->addInput($beijing);
    /* --------------------------------------- */
    $buildYear = new Typecho_Widget_Helper_Form_Element_Text('buildYear', null, date('Y'), _t('建站年份'), _t('什么时候开始建站的呀'));
    $form->addInput($buildYear);
    /* --------------------------------------- */
    $Notice = new Typecho_Widget_Helper_Form_Element_Text('Notice', NULL, NULL, _t('站点首页公告'), _t('在这里输入公告内容,留空则不显示'));
	$form->addInput($Notice);
    /* --------------------------------------- */
    $ICPbeian = new Typecho_Widget_Helper_Form_Element_Text('ICPbeian', NULL, NULL, _t('ICP备案号'), _t('在这里输入ICP备案号,留空则不显示'));
	$form->addInput($ICPbeian);
    /* --------------------------------------- */
	$gonganbeian = new Typecho_Widget_Helper_Form_Element_Text('gonganbeian', NULL, NULL, _t('公安联网备案号'), _t('在这里输入公安联网备案号,留空则不显示'));
	$form->addInput($gonganbeian);
    /* --------------------------------------- */
    $CustomCSS = new Typecho_Widget_Helper_Form_Element_Textarea('CustomCSS', NULL, NULL, _t('自定义样式'), _t('在这里填入你的自定义样式（直接填入css，无需&lt;style&gt;标签）'));
	$form->addInput($CustomCSS);
    /* --------------------------------------- */
	$CustomContent = new Typecho_Widget_Helper_Form_Element_Textarea('CustomContent', NULL, NULL, _t('底部自定义内容'), _t('位于底部，footer之后body之前，适合放置一些JS内容，如网站统计代码等（若开启全站Pjax，目前支持Google和百度统计的回调，其余统计代码可能会不准确）'));
	$form->addInput($CustomContent);
}
