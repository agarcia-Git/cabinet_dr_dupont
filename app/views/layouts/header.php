<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Cabinet Dr. Dupont' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --bleu: #185FA5; }
        body { font-family: 'Segoe UI', sans-serif; }
        .navbar { background-color: var(--bleu) !important; }
        .navbar-brand, .nav-link { color: white !important; }
        .nav-link:hover { color: #d0e8ff !important; }
        .btn-rdv { background-color: white; color: var(--bleu); font-weight: bold; border-radius: 25px; padding: 8px 20px; }
        .btn-rdv:hover { background-color: #d0e8ff; color: var(--bleu); }
        footer { background-color: var(--bleu); color: white; padding: 30px 0; margin-top: 60px; }
        footer a { color: #d0e8ff; text-decoration: none; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-heart-pulse"></i> Cabinet Dr. Dupont
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon" style="filter: invert(1)"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?url=services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?url=actualites">Actualités</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?url=a-propos">À propos</a></li>
                <li class="nav-item">
                    <a class="btn btn-rdv" href="index.php?url=rendez-vous">Prendre rendez-vous</a>
                </li>
            </ul>
        </div>
    </div>
</nav>