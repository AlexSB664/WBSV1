<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="https://coliseumwbs.com/">
            <img src="/img/logo-wbs-horizontal.png" style="height:75px;width:150px;" alt="WBS" title="WBS" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-flash"></i><?= __('MANAGE') ?></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'competitions', 'action' => 'myCompetitions']); ?>"><?= __('My Competitions') ?></a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'matches', 'action' => 'lazyAddV2']); ?>"><?= __('Matches') ?></a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-tasks"></i><?= __('LEAGUES') ?></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'leagues', 'action' => 'myLeagues']); ?>"><?= __('My Leagues') ?></a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-qrcode"></i><?= __('SEASONS') ?></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'seasons', 'action' => 'add']); ?>"><?= __('Add Seasons') ?></a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'seasons', 'action' => 'mySeasons']); ?>"><?= __('My Seasons') ?></a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-sitemap"></i><?= __('SCHEMES') ?></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                        <i class="fa fa-line-chart"></i>Freestylers</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'freestylers', 'action' => 'discoveryTop']); ?>">Top 32 Ranking</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'freestylers', 'action' => 'bestOfYear']); ?>">All Ranking</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>