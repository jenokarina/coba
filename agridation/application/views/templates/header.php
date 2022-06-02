<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?=base_url('assets/styles/')?>style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />

    <title><?= $title ?></title>
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="./assets/img/logorem.png" alt="Logo Agridation" class="w-50" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Lomba</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Acara</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active">Artikel</a>
            </li>
          </ul>
          <button class="btn btn-masuk me-2 ms-4 fw-bold" type="button">Masuk</button>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->