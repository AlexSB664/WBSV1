<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <!-- NOTIFICATION SECTION -->
                    <?php //echo $this->element('notification') 
                    ?>
                    <!-- END NOTIFICATION SECTION -->
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <?php if ($this->request->session()->read('Auth.User.avatar') == null || empty($this->request->session()->read('Auth.User.avatar'))) : ?>
                                    <?= $this->Html->image('default.png', ['alt' => "default-avatar"]); ?>
                                <?php else : ?>
                                    <?= $this->Html->image($this->request->session()->read('Auth.User.avatar'), ['alt' =>$this->request->session()->read('Auth.User.aka')]); ?>
                                <?php endif ?>
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?=$this->request->session()->read('Auth.User.aka') ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <?php if ($this->request->session()->read('Auth.User.avatar') == null || empty($this->request->session()->read('Auth.User.avatar'))) : ?>
                                                <?= $this->Html->image('default.png', ['alt' => "default-avatar"]); ?>
                                            <?php else : ?>
                                                <?= $this->Html->image($this->request->session()->read('Auth.User.avatar'), ['alt' => "default-avatar"]); ?>
                                            <?php endif ?>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?=$this->request->session()->read('Auth.User.aka') ?></a>
                                        </h5>
                                        <span class="email"><?=$this->request->session()->read('Auth.User.email') ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="#">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>