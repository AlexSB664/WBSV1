<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League $league
 */
?>
<div="league-header">
	<span class="login100-form-logo">
            <?= $this->Html->image($league->logo, ['alt' => "$league->name",'width'=>'120','height'=>'120', 'class'=>'center']); ?>
	</span>

	<span class="login100-form-title p-b-34 p-t-27"> <?= h($league->name) ?> </span>
</div>

  <div id="social">
    <ul class="social">
        <li><a href="<?= $league->social_facebook; ?>"><i class="fa fa-facebook" aria-hidden="true"> </i></a></li>
        <li><a href="<?= $league->social_twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"> </a></i></li>
        <li><a href="<?= $league->social_instagram; ?>"><i class="fa fa-instagram" aria-hidden="true"> </i></a></li>
        <li><a href="<?= $league->social_youtube; ?>"><i class="fa fa-youtube" aria-hidden="true"> </a></i></li>
        <li><a href="<?= $league->social_website; ?>"><i class="fa fa-globe" aria-hidden="true"> </a></i></li>
        <li><a href="<?= $league->social_phone; ?>"><i class="fa fa-phone" aria-hidden="true"> <?= $league->social_phone; ?></a></i></li>
        <li><a href="<?= $league->social_email; ?>"><i class="fa fa-envelope" aria-hidden="true"> FFF <?= $league->social_email; ?> </a></i></li>

    </ul>
  </div>  

<div class="contact" >
	    <?= __('Website') ?>
            <?= h($league->social_website) ?>
            <?= __('Telefono') ?>
            <?= h($league->contact_phone) ?>
            <?= __('Email') ?>
            <?= h($league->contact_email) ?>
            <?= __('Fecha de Creacion') ?>
	    <?= h($league->since) ?>
</div>
    <div class="related">
        <h4><?= __('Temporadas') ?></h4>
        <?php if (!empty($league->seasons)) : ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('League Id') ?></th>
                    <th scope="col"><?= __('Status') ?></th>
                    <th scope="col"><?= __('Date Start') ?></th>
                    <th scope="col"><?= __('Date End') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($league->seasons as $seasons) : ?>
                    <tr>
                        <td><?= h($seasons->id) ?></td>
                        <td><?= h($seasons->name) ?></td>
                        <td><?= h($seasons->description) ?></td>
                        <td><?= h($seasons->league_id) ?></td>
                        <td><?= h($seasons->status) ?></td>
                        <td><?= h($seasons->date_start) ?></td>
                        <td><?= h($seasons->date_end) ?></td>
                        <td><?= h($seasons->created) ?></td>
                        <td><?= h($seasons->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Seasons', 'action' => 'view', $seasons->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Seasons', 'action' => 'edit', $seasons->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Seasons', 'action' => 'delete', $seasons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seasons->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
