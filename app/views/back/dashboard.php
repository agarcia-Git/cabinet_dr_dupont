<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Cabinet Dr. Dupont</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f4f8; }
        .sidebar {
            width: 240px; background: #185FA5; color: white;
            height: 100vh; position: fixed; padding: 20px 0;
        }
        .sidebar h2 { text-align: center; padding: 0 20px 20px; font-size: 16px; border-bottom: 1px solid rgba(255,255,255,0.2); }
        .sidebar a { display: block; padding: 12px 20px; color: white; text-decoration: none; font-size: 14px; }
        .sidebar a:hover { background: rgba(255,255,255,0.1); }
        .sidebar a.active { background: rgba(255,255,255,0.2); }
        .main { margin-left: 240px; padding: 30px; }
        .main h1 { font-size: 22px; margin-bottom: 8px; color: #1a1a2e; }
        .main p { color: #666; margin-bottom: 30px; font-size: 14px; }
        .cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px; }
        .card { background: white; border-radius: 10px; padding: 24px; text-align: center; }
        .card .number { font-size: 36px; font-weight: bold; color: #185FA5; }
        .card .label { font-size: 14px; color: #666; margin-top: 6px; }
        .logout { display: block; margin: 20px; padding: 10px; background: rgba(255,255,255,0.1); border-radius: 6px; text-align: center; color: white; text-decoration: none; font-size: 13px; }
        .logout:hover { background: rgba(255,255,255,0.2); }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Cabinet Dr. Dupont</h2>
        <a href="index.php?url=admin" class="active">Tableau de bord</a>
        <a href="index.php?url=admin/rendez-vous">Rendez-vous</a>
        <a href="index.php?url=admin/patients">Patients</a>
        <a href="index.php?url=admin/actualites">Actualités</a>
        <a href="index.php?url=admin/horaires">Horaires</a>
        <a href="index.php?url=logout" class="logout">Se déconnecter</a>
    </div>

    <div class="main">
        <h1>Tableau de bord</h1>
        <p>Bienvenue <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></p>

        <div class="cards">
            <div class="card">
                <div class="number"><?= count($rdvs) ?></div>
                <div class="label">Rendez-vous</div>
            </div>
            <div class="card">
                <div class="number"><?= count($patients) ?></div>
                <div class="label">Patients</div>
            </div>
            <div class="card">
                <div class="number"><?= count($services) ?></div>
                <div class="label">Services</div>
            </div>
        </div>
    </div>
</body>
</html>