<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="/img/logo-wbs-horizontal.png" style="height:75px;width:150px;" alt="WBS" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <!-- NAVBAR MOBILE -->
    <?php if ($this->request->getSession()->read('Auth.User.role') == 'admin') : ?>
        <!-- for admin -->
        <?php echo $this->element('navbar_mobile_admin') ?>
    <?php elseif ($this->request->getSession()->read('Auth.User.role') == 'organizers') : ?>
        <!-- for organizer -->
        <?php echo $this->element('navbar_mobile_organizers') ?>
    <?php elseif ($this->request->getSession()->read('Auth.User.role') == 'participant') : ?>
        <!-- for participants -->
        <?php echo $this->element('navbar_mobile_participant') ?>
    <?php endif ?>
    <!-- END NAVBAR MOBILE -->
</header>