<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Static Contents'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="staticContents form large-10 medium-9 columns">
    <?= $this->Form->create($staticContent); ?>
    <fieldset>
        <legend><?= __('Add Static Content') ?></legend>
        <?php
            echo $this->Form->input('title');
            // echo $this->Form->input('slug');
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php
echo $this->Html->scriptBlock('jQuery(document).ready(function(){
    tinymce.init({
    selector: "textarea",
    height:450,
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: \'Test template 1\', content: \'Test 1\'},
        {title: \'Test template 2\', content: \'Test 2\'}
    ]
})
;});', array('block' => 'scriptbottom'));
?>
