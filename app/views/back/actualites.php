<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités — Cabinet Dr. Dupont</title>
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
        .btn-ajouter { display: inline-block; padding: 10px 20px; background: #185FA5; color: white; border-radius: 6px; text-decoration: none; font-size: 13px; margin-bottom: 20px; }
        table { width: 100%; background: white; border-radius: 10px; border-collapse: collapse; }
        th { background: #185FA5; color: white; padding: 12px 16px; text-align: left; font-size: 13px; }
        td { padding: 12px 16px; font-size: 13px; border-bottom: 1px solid #f0f4f8; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8fafc; }
        .btn { padding: 6px 12px; border-radius: 6px; font-size: 12px; text-decoration: none; }
        .btn-modifier { background: #dae8fc; color: #185FA5; }
        .btn-supprimer { background: #f8cecc; color: #993C1D; }
        .extrait { max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
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
        <a href="index.php?url=admin/actualites" class="active">Actualités</a>
        <a href="index.php?url=admin/horaires">Horaires</a>
        <a href="index.php?url=logout" class="logout">Se déconnecter</a>
    </div>

    <div class="main">
        <h1>Gestion des actualités</h1>
        <a href="index.php?url=admin/actualite-ajouter" class="btn-ajouter">+ Ajouter une actualité</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actualites as $actualite) : ?>
                <tr>
                    <td><?= $actualite->getId() ?></td>
                    <td><?= htmlspecialchars($actualite->getTitre()) ?></td>
                    <td class="extrait"><?= htmlspecialchars($actualite->getContenu()) ?></td>
                    <td><?= $actualite->getDatePublication() ?></td>
                    <td>
                        <a href="index.php?url=admin/actualite-modifier&id=<?= $actualite->getId() ?>" class="btn btn-modifier">Modifier</a>
                        <a href="index.php?url=admin/actualite-supprimer&id=<?= $actualite->getId() ?>" class="btn btn-supprimer" onclick="return confirm('Supprimer cette actualité ?')">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>