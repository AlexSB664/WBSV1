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
                        <i class="fas fa-flash"></i>Manage</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'competitions', 'action' => 'manage']); ?>">Competitions</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'matches', 'action' => 'lazyAddV2']); ?>">Matches</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'matches', 'action' => 'lazyAdd']); ?>">Old lazyAdd</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-tasks"></i>Leagues</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'leagues', 'action' => 'add']); ?>">Add Leagues</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'leagues', 'action' => 'index']); ?>">List Leagues</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-qrcode"></i>Seasons</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'seasons', 'action' => 'add']); ?>">Add Seasons</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'seasons', 'action' => 'index']); ?>">List Seasons</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-sitemap"></i>Schemes</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'schemes', 'action' => 'add']); ?>">Add Schemes</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'schemes', 'action' => 'index']); ?>">List Schemes</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-edit"></i>Schemes Details</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'schemes_details', 'action' => 'add']); ?>">Add Schemes Details</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'schemes_details', 'action' => 'index']); ?>">List Schemes Details</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-map-marker-alt"></i>Locations</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'add']); ?>">Add New User</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index']); ?>">List Users</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>