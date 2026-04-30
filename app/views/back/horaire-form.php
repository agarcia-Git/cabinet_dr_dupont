<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les horaires — Cabinet Dr. Dupont</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f4f8; }
        .sidebar { width: 240px; background: #185FA5; color: white; height: 100vh; position: fixed; padding: 20px 0; }
        .sidebar h2 { text-align: center; padding: 0 20px 20px; font-size: 16px; border-bottom: 1px solid rgba(255,255,255,0.2); }
        .sidebar a { display: block; padding: 12px 20px; color: white; text-decoration: none; font-size: 14px; }
        .sidebar a:hover { background: rgba(255,255,255,0.1); }
        .sidebar a.active { background: rgba(255,255,255,0.2); }
        .main { margin-left: 240px; padding: 30px; }
        .main h1 { font-size: 22px; margin-bottom: 24px; color: #1a1a2e; }
        .card { background: white; border-radius: 10px; padding: 30px; max-width: 400px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-size: 13px; font-weight: bold; color: #333; margin-bottom: 6px; }
        input[type="time"] {
            width: 100%; padding: 10px 14px; border: 1px solid #dce3ea;
            border-radius: 6px; font-size: 13px; color: #333;
        }
        input:focus { outline: none; border-color: #185FA5; }
        .form-actions { display: flex; gap: 12px; margin-top: 24px; }
        .btn-submit { padding: 10px 24px; background: #185FA5; color: white; border: none; border-radius: 6px; font-size: 13px; cursor: pointer; }
        .btn-annuler { padding: 10px 24px; background: #f0f4f8; color: #555; border: none; border-radius: 6px; font-size: 13px; text-decoration: none; display: inline-flex; align-items: center; }
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
        <h1>Modifier les horaires — <?= htmlspecialchars($horaire->getJourSemaine()) ?></h1>
        <div class="card">
            <form method="POST" action="index.php?url=admin/horaire-modifier&id=<?= $horaire->getId() ?>">
                <div class="form-group">
                    <label for="heure_ouverture">Heure d'ouverture</label>
                    <input type="time" id="heure_ouverture" name="heure_ouverture" required
                           value="<?= htmlspecialchars($horaire->getHeureOuverture()) ?>">
                </div>
                <div class="form-group">
                    <label for="heure_fermeture">Heure de fermeture</label>
                    <input type="time" id="heure_fermeture" name="heure_fermeture" required
                           value="<?= htmlspecialchars($horaire->getHeureFermeture()) ?>">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-submit">Enregistrer</button>
                    <a href="index.php?url=admin/horaires" class="btn-annuler">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>