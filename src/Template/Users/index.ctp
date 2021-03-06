<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!-- Search BLOCK -->
<?= $this->Form->create(null, ['method' => 'GET']); ?>
<?= $this->Form->control('search', ['class' => 'form-control', 'label' => 'Nombre o Correo']); ?>
<?= $this->Form->button('Buscar', ['class' => 'btn btn-outline-success']) ?>
<input type="button" class="btn btn-outline-warning" onclick="window.location.href = '<?= $this->Url->build(['action' => 'index']); ?>';" value="Reset" />
<?= $this->Form->end(); ?>
<!-- END Search BLOCK -->
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('avatar') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fullname') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aka') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('crew_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= $this->Html->image($user->avatar, ['alt' => "default-avatar", 'width' => '65', 'height' => '55']); ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->fullname) ?></td>
                        <td><?= h($user->aka) ?></td>
                        <td><?= $user->has('crew') ? $this->Html->link($user->crew->name, ['controller' => 'Crews', 'action' => 'view', $user->crew->id]) : '' ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->role) ?></td>
                        <td><?= h($user->status) ?></td>
                        <td><?= h($user->telephone) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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