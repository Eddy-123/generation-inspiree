<?php $title_for_layout = $page->name; ?>
<h1><?= $page->name ?></h1>
<?= $page->content ?>
<?= ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php'; ?>