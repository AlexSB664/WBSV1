<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
                <div class="row align-items-center justify-content-center">
                        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                                <h1 class="league-title text-white">Batallas</h1>
	 		                	<h2 class="seasson-title">del</h2>
            			        <h2 class="event-title">Evento</h2>
			</div>
                </div>
        </div>
</div>

<div class="row">
      <div class="col-10 col-sm-2"></div>
      <div class="col-10 col-sm-10">
        <div class="table-responsive-md">
            <table class="table table-responsive leaderboard">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Posición</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Freestyler</th>
                        <th scope="col">Points</th>
                        <th scope="col">Score</th>
                    </tr>
                  </thead>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>Avatar </td>
                        <td>  $row['aka']  </td>
                        <td> $row['points'] </td>
                        <td> $row['score'] </td>

                    </tr>

                </tbody>
            </table>

          </div>
    </div>
    <div class="col-10 col-sm-2"></div>
</div>
<?php foreach ($list as $key =>  $item): ?>
<?= $key ?>
<?php foreach ($item as  $match): ?>

<h1>Batalla</h1>
<?php foreach ($match as  $user): ?>
<br>
<br>
<?= ($user->aka) ?>
<br>
<?php endforeach ?>
<h1>Termina aqui</h1>
<?php endforeach ?>
<?php endforeach ?> 

<div class="container">
  <div class="row">
    <div class="col">
      1 of 2
    </div>
    <div class="col">
      2 of 2
    </div>
  </div>
  <div class="row">
    <div class="col">
      1 of 3
    </div>
    <div class="col">
      2 of 3
    </div>
    <div class="col">
      3 of 3
    </div>
  </div>
</div>