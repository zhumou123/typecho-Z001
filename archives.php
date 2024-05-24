<?php
/**
 * 归档页
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('public/header.php');
?>

<div class="container">
<div class="card p-4">
<div>
  <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
  <div>文章总数：<?php $stat->publishedPostsNum() ?>篇</div>
  <div>分类总数：<?php $stat->categoriesNum() ?>个</div>
  <div>评论总数：<?php $stat->publishedCommentsNum() ?>条</div>
  <div>页面总数：<?php $stat->publishedPagesNum() ?>个</div>
</div>

  <?php
  $Month_E = array(
  1 => "一月",
  2 => "二月",
  3 => "三月",
  4 => "四月",
  5 => "五月",
  6 => "六月",
  7 => "七月",
  8 => "八月",
  9 => "九月",
  10 => "十月",
  11 => "十一月",
  12 => "十二月");
  $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
  $year = 0;
  $mon = 0;
  $i = 0;
  $j = 0;
  $all = array();
  $output = '';
  while ($archives->next()):
  $year_tmp = date('Y', $archives->created);
  $mon_tmp = date('n', $archives->created);
  $y = $year;
  $m = $mon;
  if ($mon != $mon_tmp && $mon > 0) $output .= '</div></div>';
  if ($year != $year_tmp) {
  $year = $year_tmp;
  $all[$year] = array();
  }

  if ($mon != $mon_tmp) {
  $mon = $mon_tmp;
  array_push($all[$year], $mon);
  $output .= "<div class='archive-title' id='arti-$year-$mon'><h3>$year-$Month_E[$mon]</h3><div class='archives archives-$mon' data-date='$year-$mon'>";
  }
  $output .= '<div class="brick"><a href="' . $archives->permalink . '" style="text-decoration:none;"><span class="time">' . date('m-d', $archives->created) . '</span style="color:#888;"> ' . $archives->title . '</a></div>';
  endwhile;
  $output .= '</div></div>';
  echo $output;

  $html = "";
  $year_now = date("Y");
  foreach ($all as $key => $value) {
  $html .= "<li class='year' id='year-$key'><a href='#' class='year-toogle' id='yeto-$key'>$key</a><ul class='monthall'>";
  for ($i = 12; $i > 0; $i--) {
  if ($key == $year_now && $i > $value[0]) continue;
  $html .= in_array($i, $value) ? ("<li class='month monthed' id='mont-$key-$i'>$i</li>") : ("<li class='month'>$i</li>");
  }
  $html .= "</ul></li>";
  }
  ?>
</div>
</div>

<?php $this->need('public/footer.php'); ?>