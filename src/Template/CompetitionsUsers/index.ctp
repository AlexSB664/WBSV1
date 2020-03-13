<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionUser[]|\Cake\Collection\CollectionInterface $competitionUsers
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Competition User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="competitionUsers index large-9 medium-8 columns content" id="divCompetitionUsers">
    <h3><?= __('Assistance') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered dataTable no-footer">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('aka') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assistance') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($competitionsUsers as $competitionUser): ?>
            <tr>
                <td id="tdaka"><?= $competitionUser->user->aka ?> </td>
                <td id="tdfullname"><?= $competitionUser->user->fullname ?> </td>
                <td id="tdavatar"><?= $this->Html->image($competitionUser->user->avatar, ['alt' => "", 'width'=>'50px','height'=>'50px']); ?></td>
                <td id="tdassistance"> 
                    <form action="<?= $this->Url->build([
                        'controller' => 'competitions_users',
                        'action' => 'assistance', $competitionUser->id]); ?>">
                        <?php if ($competitionUser->assistance ==1): ?>
                        <input type="submit" class="btn btn-success" value="Presente" />
                        <?php else : ?>
                        <input type="submit" class="btn btn-danger" value="Ausente" />
                        <?php endif; ?>
                    </form>
                </td>
            </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</div>