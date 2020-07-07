<?php $title_for_layout = $page->name; ?>

<?php /* $page->name */?>

<?php
$file = ROOT.DS."view".DS."includes".DS.$page->alias.".php";
if(file_exists($file)){
    require $file;
}
?>

<?= $page->content ?>
