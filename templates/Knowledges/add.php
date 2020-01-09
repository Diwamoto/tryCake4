<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Knowledge $knowledge
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Knowledges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="knowledges form content">
            <?= $this->Form->create($knowledge) ?>
            <fieldset>
                <legend><?= __('Add Knowledge') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('detail');
                    echo $this->Form->control('examples');
                    echo $this->Form->control('tag_ids');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
