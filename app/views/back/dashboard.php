<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Cabinet Dr. Dupont</title>
</head>
<body>
    <h1>Tableau de bord</h1>
    <p>Bienvenue <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></p>
    <a href="index.php?url=logout">Se déconnecter</a>
</body>
</html>