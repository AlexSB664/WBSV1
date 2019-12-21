<div class="site-navbar mt-4">
    <div class="container py-1">
        <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
                <h1 class="mb-0">
                    <a href="https://coliseumwbs.com/" class="text-white h2 mb-0">
                        <img src="/img/logo-wbs-horizontal.png" height="70" width="148" />
                    </a>
                </h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
                <nav class="site-navigation text-right text-md-right" role="navigation">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li <?= $this->request->params['controller'] === 'Competitions' ? 'class="active"' : '' ?>>
                            <a href="<?= $this->Url->build([
                                            'controller' => 'Competitions',
                                            'action' => 'index'
                                        ]);
                                        ?>">Inicio</a>
                        </li>
                        <li <?= $this->request->params['controller'] === 'Leagues' ? 'class="active"' : '' ?>>
                            <a href="<?= $this->Url->build([
                                            'controller' => 'Leagues',
                                            'action' => 'index'
                                        ]);
                                        ?>">Ligas</a>
                        </li>
                        <li <?= ($this->request->url) === 'eventos' ? 'class="active"' : '' ?>>
                            <a href="<?= $this->Url->build([
                                            'controller' => 'eventos'
                                        ]);
                                        ?>">Eventos</a>
                        </li>
                        <li <?= ($this->request->url) === 'freestylers' ? 'class="active"' : '' ?>>
                            <a href="<?= $this->Url->build([
                                            'controller' => 'freestylers',
                                            'action'=>'bestOfYear'
                                        ]);
                                        ?>">Freestylers</a>
                        </li>
                        <li <?= ($this->request->url) === 'estadisticas' ? 'class="active"' : '' ?>>
                            <a href="<?= $this->Url->build([
                                            'controller' => 'estadisticas'
                                        ]);
                                        ?>">Estadísticas</a>
                        </li>
                        <li <?= ($this->request->url) === 'contacto' ? 'class="active"' : '' ?>>
                            <a href="<?= $this->Url->build([
                                            'controller' => 'contact',
                                            'action' => 'contact'
                                        ]);
                                        ?>">Contacto</a>
                        </li>
                        <?php if (empty($this->request->getSession()->read('Auth.User.id'))) : ?>
                            <li>
                                <a href="<?= $this->Url->build([
                                                    'controller' => 'users',
                                                    'action' => 'login'
                                                ]);
                                                ?>">Login</a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a href="<?= $this->Url->build([
                                                    'controller' => 'users',
                                                    'action' => 'logout'
                                                ]);
                                                ?>">Logout</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<!-- .site-mobile-menu -->