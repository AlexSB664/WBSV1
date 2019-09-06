<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><img src="images/icon.png" style="background-color:black;" width="34" height="34">
                <span>WBS</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <?php if ($this->request->session()->read('Auth.User.avatar') == null || empty($this->request->session()->read('Auth.User.avatar'))) : ?>
                <?= $this->Html->image('default.png', ['alt' => "default-avatar", 'class' => 'img-circle profile_img']); ?>
                <?php else : ?>
                <?= $this->Html->image($this->request->session()->read('Auth.User.avatar'), ['alt' => "default-avatar", 'class' => 'img-circle profile_img']); ?>
                <?php endif ?>
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <?= $this->request->session()->read('Auth.User.fullname') ?>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <a> <span class="fa fa-chevron-down"><?= $this->Html->link(__('Ligas'), ['controller' => 'Leagues', 'action' => 'index']) ?></span></a>
                            <li><?= $this->Html->link(__('Nueva Liga'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
                            <li><?= $this->Html->link(__('Nuevo Esquema'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
                            <a><span class="fa fa-chevron-down"><?= $this->Html->link(__('Temporadas'), ['controller' => 'Seasons', 'action' => 'index']) ?></span></a>
                            <li><?= $this->Html->link(__('Nueva Temporada'), ['controller'=>'Seasons', 'action' => 'add']) ?></li>
                            <a><span class="fa fa-chevron-down"><?= $this->Html->link(__('Competencias'), ['controller' => 'Competitions', 'action' => 'index']) ?></span></a>
                            <li><?= $this->Html->link(__('Asistencia'), ['controller' => 'CompetitionsUsers','action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('Nueva Competencia'), ['controller' => 'Competitions','action' => 'add']) ?></li>
                            <li><?= $this->Html->link(__('Nueva Direccion'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
                            <li><?= $this->Html->link(__('Nuevo Enfrentamiento'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
