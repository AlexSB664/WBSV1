<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = "deejee";

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
                <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                                <h1 class="text-white">PROXIMAMENTE</h1>
                                <p>Esta sección aún no está disponible, suscribete a nuestras redes sociales para estar al pendiente.</p>
                        </div>
                </div>
        </div>
</div>
 
