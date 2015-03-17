<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Static Content'), ['action' => 'edit', $staticContent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Static Content'), ['action' => 'delete', $staticContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staticContent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Static Contents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Static Content'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="staticContents view large-10 medium-9 columns">
    <h2><?= h($staticContent->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($staticContent->title) ?></p>
            <h6 class="subheader"><?= __('Slug') ?></h6>
            <p><?= h($staticContent->slug) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($staticContent->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($staticContent->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($staticContent->modified) ?></p>
            <h6 class="subheader"><?= __('Preview Page') ?></h6>
            <!-- <p><?php echo $this->Html->link('Preview', ['_name' => 'postsView', '_entity' => $staticContent->slug ]); ?> -->
            <p><?php echo $this->Html->link('Preview', ['controller' => 'StaticContents', 'action' => 'preview', 'slug' => $staticContent->slug ]); ?>
            </p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Content') ?></h6>
            <?= $this->Text->autoParagraph(h($staticContent->content)); ?>

        </div>
    </div>
</div>
