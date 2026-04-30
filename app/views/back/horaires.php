<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horaires — Cabinet Dr. Dupont</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f4f8; }
        .sidebar { width: 240px; background: #185FA5; color: white; height: 100vh; position: fixed; padding: 20px 0; }
        .sidebar h2 { text-align: center; padding: 0 20px 20px; font-size: 16px; border-bottom: 1px solid rgba(255,255,255,0.2); }
        .sidebar a { display: block; padding: 12px 20px; color: white; text-decoration: none; font-size: 14px; }
        .sidebar a:hover { background: rgba(255,255,255,0.1); }
        .sidebar a.active { background: rgba(255,255,255,0.2); }
        .main { margin-left: 240px; padding: 30px; }
        .main h1 { font-size: 22px; margin-bottom: 20px; color: #1a1a2e; }
        table { width: 100%; max-width: 600px; background: white; border-radius: 10px; border-collapse: collapse; }
        th { background: #185FA5; color: white; padding: 12px 16px; text-align: left; font-size: 13px; }
        td { padding: 12px 16px; font-size: 13px; border-bottom: 1px solid #f0f4f8; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8fafc; }
        .btn { padding: 6px 12px; border-radius: 6px; font-size: 12px; text-decoration: none; }
        .btn-modifier { background: #dae8fc; color: #185FA5; }
        .logout { display: block; margin: 20px; padding: 10px; background: rgba(255,255,255,0.1); border-radius: 6px; text-align: center; color: white; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Cabinet Dr. Dupont</h2>
        <a href="index.php?url=admin">Tableau de bord</a>
        <a href="index.php?url=admin/rendez-vous">Rendez-vous</a>
        <a href="index.php?url=admin/patients">Patients</a>
        <a href="index.php?url=admin/services">Services</a>
        <a href="index.php?url=admin/actualites">Actualités</a>
        <a href="index.php?url=admin/horaires" class="active">Horaires</a>
        <a href="index.php?url=logout" class="logout">Se déconnecter</a>
    </div>

    <div class="main">
        <h1>Gestion des horaires</h1>
        <table>
            <thead>
                <tr>
                    <th>Jour</th>
                    <th>Ouverture</th>
                    <th>Fermeture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($horaires as $horaire) : ?>
                <tr>
                    <td><?= htmlspecialchars($horaire->getJourSemaine()) ?></td>
                    <td><?= htmlspecialchars($horaire->getHeureOuverture()) ?></td>
                    <td><?= htmlspecialchars($horaire->getHeureFermeture()) ?></td>
                    <td>
                        <a href="index.php?url=admin/horaire-modifier&id=<?= $horaire->getId() ?>" class="btn btn-modifier">Modifier</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>