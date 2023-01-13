<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Web Cinema</a>
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
          <div class="col-8">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
          </div>
          <div class="col-auto">
          <input class="form-control" type="submit" value="Filter">
          </div>
        </form>
        <ul class="navbar-nav mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="signup.php">Signup</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>