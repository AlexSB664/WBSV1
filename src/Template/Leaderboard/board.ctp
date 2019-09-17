<div class="content">

    <div class="center">

        <?= $this->Html->image('logo-wbs.png', ['alt' => 'Logo WBS', 'class' => 'logos','width'=>'100','height'=>'100']); ?>
        <div class="logos">
            <h1 class="league-title"> Jueves de Practica tu Freestyle </h1>
            <h2 class="seasson-title"> Temporada Septiembre 2019 </h2>
            <h2 class="event-title"> Jornada 01 </h2>
        </div>

        <?= $this->Html->image($leagues->logo, ['alt' => 'Logo Liga', 'class' => 'logos','width'=>'100','height'=>'100']); ?>

    </div>

    <div class="leaderboard flex column wrap">
        <div class="leaderboard-table flex column" style="color:black">
            <div class="leaderboard-header flex column grow">

                <div class="filter-by flex grow wrap">
                    <div class="time-filter flex grow">
                        <div class="row-button pointer row-button--active align-center">General</div>
                        <div class="row-button pointer align-center">J1</div>
                        <div class="row-button pointer align-center">J2</div>
                    </div>
                    <div class="subject-filter flex grow">

                    </div>
                </div>

                <div class="leaderboard-row flex align-center row--header" style="border-radius: 0 !important;">
                    <div class="row-position">Posicion</div>
                    <div class="row-collapse flex align-center">
                        <div class="row-user--header">Freestyler</div>
                        <div class="row-team--header">Crew</div>
                    </div>
                    <div class="row-calls">Puntos</div>
                </div>
            </div>


            <div class="leaderboard-body flex column grow">
                <?php foreach ($board as $row) : ?>
                    <div class="leaderboard-row flex align-center">
                        <div class="row-position"> <?= $row['position'] ?></div>
                        <div class="row-collapse flex align-center">
                            <div class="row-caller flex">
                                <?= $this->Html->image($row['avatar'], ['alt' => "default-avatar", 'class' => 'avatar']); ?>
                                <div class="row-user"> <?= $row['aka'] ?></div>
                            </div>
                            <div class="row-team"> <?= $row['crew'] ?></div>
                        </div>
                        <div class="row-calls"> <?= $row['points'] ?></div>
                    </div>
                <?php endforeach ?>



                <!-- <div class="leaderboard-footer flex align-center">
  Pagina 1 de 2 <a class="footer-btn pointer">Next</a> 5 de 8 elementos
      </div> -->

            </div>
        </div>

    </div>

</div>