<div class="album py-5 bg-light">
  <div class="container">
    <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($data as $film) : ?>
        <div class="col-auto">
          <div class="card shadow-sm">
            <form id="frm" action="film.php" method="post">
              <input type="hidden" name="idFilm" value="<?= $film->idFilm ?>">
              <input type="image" class="col-12" src="<?= $film->poster ?>">
              <button class="btn card-text" type="submit"><?= $film->title ?></button>
              <div class="card-body">
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
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>