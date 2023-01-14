<?php require_once('plugins/poster.php'); ?>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="text-start row row-cols-lg-4 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($data as $film) : ?>
        <div class="col-auto">
          <div class="card h-100 shadow-sm">
            <form class="text-start h-100 py-0" id="frm" action="film.php" method="post">
              <button class="h-100 text-start col-12 btn btn-light p-0" type="submit">
              <div class="h-100">
                <img src="<?= poster($film->title) ?>" class="float-lg-start w-100 rounded pb-2"/>
                <div class="card-body">
                  <p class="card-text"><?= $film->title ?></p>
                  <p class="card-text">Genre: <?= $film->genre ?></p>
                  <p class="card-text">Year: <?= $film->year ?></p>
                  <p class="card-text">
                    <?php
                    if ($film->inProjection) {
                      echo "Airing now";
                    } else {
                      echo "Not airing";
                    }
                    ?>
                  </p>
                </div>
              </div>
              </button>
              <input type="hidden" name="idFilm" value="<?= $film->idFilm ?>">
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>