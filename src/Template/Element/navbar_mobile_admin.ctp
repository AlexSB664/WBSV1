<nav class="navbar-mobile">
    <div class="container-fluid">
        <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fas fa-flash"></i><?= __('MANAGE') ?></a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'competitions', 'action' => 'manage']); ?>"><?= __('Competitions') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'matches', 'action' => 'lazyAddV2']); ?>"><?= __('Matches') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'matches', 'action' => 'lazyAdd']); ?>">Old lazyAdd</a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fa fa-tasks"></i><?= __('LEAGUES') ?></a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'leagues', 'action' => 'add']); ?>">Add Leagues</a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'leagues_users', 'action' => 'add']); ?>">Assign Organizer</a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'leagues', 'action' => 'manage']); ?>"><?= __('List Leagues') ?></a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fa fa-qrcode"></i><?= __('SEASONS') ?></a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'seasons', 'action' => 'add']); ?>"><?= __('Add Seasons') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'seasons', 'action' => 'index']); ?>"><?= __('List Seasons') ?></a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fa fa-sitemap"></i><?= __('SCHEMES') ?></a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'schemes', 'action' => 'add']); ?>"><?= __('Add Schemes') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'schemes', 'action' => 'index']); ?>"><?= __('List Schemes') ?></a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fa fa-edit"></i><?= __('SCHEMES DETAILS') ?></a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'schemes_details', 'action' => 'add']); ?>"><?= __('Add Schemes Details') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'schemes_details', 'action' => 'index']); ?>"><?= __('List Schemes Details') ?></a>
                    </li>
                </ul>
            </li>

            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fas fa-map-marker-alt"></i>Locations</a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'locations', 'action' => 'add']); ?>">Add Locations</a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'locations', 'action' => 'index']); ?>">List Locations</a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fa fa-group"></i>Users</a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'add']); ?>">Add New User</a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index']); ?>">List Users</a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fa fa-line-chart"></i>Freestylers</a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'freestylers', 'action' => 'discoveryTop']); ?>">Top 32 Ranking</a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'freestylers', 'action' => 'bestOfYear']); ?>">All Ranking</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>