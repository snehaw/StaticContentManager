<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script('StaticContentManager.jquery', array('block' => 'script')); ?>
    <?= $this->Html->script('StaticContentManager.tinymce/tinymce.min', array('block' => 'script')); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    
</head>
<body>
    <header>
        <div class="header-title">
            <span><?= $this->fetch('title') ?></span>
        </div>
        <div class="header-help">
            <span><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></span>
            <span><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></span>
            <?php if ($this->Session->read('Auth.User.id')) : ?>
            <span><?= $this->Session->read('Auth.User.role') ?></span>
            <span><?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?></span>
            <?php else: ?>
            <span><?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login']) ?></span>
            <?php endif; ?>
        </div>
    </header>
    <div id="container">

        <div id="content">
            <?= $this->Flash->render('auth') ?>
            <?= $this->Flash->render() ?>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('scriptbottom') ?>
</body>
</html>
