<body class="login">
    <?php if (isset($competitions)) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th>all competitions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- GENERAL -->
                    <td onclick="window.location='<?= $this->Url->build([
                                                            'controller' => 'leaderboard',
                                                            'action' => 'board',
                                                            $leagues->slug,
                                                            $seasons->slug,
                                                            'all'
                                                        ]); ?>'">
                        General
                        <?= $this->Html->image($seasons->flyer, [
                                'alt' => "default-avatar",
                                'width' => '250', 'height' => '250'
                            ]); ?>
                    </td>
                </tr>
                <?php foreach ($competitions as $competition) : ?>
                    <tr>
                        <td onclick="window.location='<?= $this->Url->build([
                                                                    'controller' => 'leaderboard',
                                                                    'action' => 'board',
                                                                    $leagues->slug,
                                                                    $seasons->slug,
                                                                    $competition->slug
                                                                ]); ?>'">
                            <?= h($competition->name) ?>
                            <?= $this->Html->image($competition->flyer, [
                                        'alt' => "default-avatar",
                                        'width' => '250', 'height' => '250'
                                    ]); ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php if ($general) : ?>
        <!-- Mega reporte aqui -->
        <?php else : ?>
        <!-- reporte solitario aqui -->
        <?= $competitions ?>
        
        <?php endif ?>

    <?php else : ?>
        <?php if (isset($seasons)) : ?>
        <!-- for choose a season -->
            <table class="table">
                <thead>
                    <tr>
                        <th>all seasons <?= $leagues->name ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($seasons as $season) : ?>
                        <tr>
                            <td onclick="window.location='<?= $this->Url->build([
                                                                            'controller' => 'leaderboard',
                                                                            'action' => 'board',
                                                                            $leagues->slug,
                                                                            $season->slug,
                                                                            'all'
                                                                        ]); ?>'">
                                <?= h($season->name) ?>
                                <?= $this->Html->image($season->flyer, [
                                                'alt' => "default-avatar",
                                                'width' => '250', 'height' => '250'
                                            ]); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else : ?>
        <!-- Catalog of leagues -->
            <table class="table">
                <thead>
                    <tr>
                        <th>all leagues</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leagues as $league) : ?>
                        <tr>
                            <td onclick="window.location='<?= $this->Url->build([
                                                                            'controller' => 'leaderboard',
                                                                            'action' => 'board',
                                                                            $league->slug
                                                                        ]); ?>'">
                                <?= h($league->name) ?>
                                <?= $this->Html->image($league->logo, [
                                                'alt' => "default-avatar",
                                                'width' => '250', 'height' => '250'
                                            ]); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    <?php endif ?>