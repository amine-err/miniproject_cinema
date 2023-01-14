<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/cinema.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-2">
      WebCinema
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
      <ul class="navbar-nav me-auto mb-2 mb-sm-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
      <form method="POST" action="search.php" class="row">
        <div class="col-auto me-0">
          <input class="form-control form-control-dark" type="text" name="title" placeholder="Search" aria-label="Search">
        </div>
        <div class="col-auto me-3">
          <input class="form-control" type="submit" value="Filter">
        </div>
      </form>
      <button type="button" class="btn btn-outline-light me-2">
        <a class="nav-link active" href="login.php">Login</a>
      </button>
      <button type="button" class="btn btn-warning">
        <a class="nav-link active" href="signup.php">Signup</a>
      </button>
    </div>
  </div>
</nav>