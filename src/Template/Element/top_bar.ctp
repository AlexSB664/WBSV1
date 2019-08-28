        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php if ($this->request->session()->read('Auth.User.avatar') == null || empty($this->request->session()->read('Auth.User.avatar'))) : ?>
                    <?= $this->Html->image('default.png', ['alt' => "default-avatar",'width'=>'75','height'=>'75']); ?>
                    <?php else : ?>
                    <?= $this->Html->image($this->request->session()->read('Auth.User.avatar'), ['alt' => "default-avatar",'width'=>'75','height'=>'75']); ?>
                    <?php endif ?>
                    <?= $this->request->session()->read('Auth.User.fullname') ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><?= $this->Html->link(__('Log Out'), ['controller' => 'users', 'action' => 'logout']) ?><i class="fa fa-sign-out pull-right"></i> </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->