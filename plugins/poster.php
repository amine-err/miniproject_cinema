<?php
include_once 'plugins/IMDB/imdb.class.php';
function poster($title)
{
  $IMDB = new IMDB($title);
  if ($IMDB->isReady) {
    return $IMDB->getPoster($sSize = 'small', $bDownload = false);
  }
}
