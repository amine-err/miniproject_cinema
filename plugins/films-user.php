<div class="album py-5 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($data as $film) : ?>
        <div class="col">
          <div class="card shadow-sm">
            <form id="frm" action="film.php" method="post">
              <input type="image" src="<?= $film->poster ?>">
              <div class="card-body">
                <p class="card-text"><?= $film->title ?> </p>
                <p class="card-text">Genre: <?= $film->genre ?></p>
                <p class="card-text">Year: <?= $film->year ?></p>
                <p class="card-text">
                  <?php
                  if ($film->inProjection) {
                    echo "In projection";
                  } else {
                    echo "Not in projection";
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