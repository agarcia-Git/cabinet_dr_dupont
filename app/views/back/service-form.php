<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $service ? 'Modifier' : 'Ajouter' ?> un service — Cabinet Dr. Dupont</title>
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
        .card { background: white; border-radius: 10px; padding: 30px; max-width: 600px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-size: 13px; font-weight: bold; color: #333; margin-bottom: 6px; }
        input[type="text"], input[type="number"], textarea {
            width: 100%; padding: 10px 14px; border: 1px solid #dce3ea;
            border-radius: 6px; font-size: 13px; color: #333;
        }
        input:focus, textarea:focus { outline: none; border-color: #185FA5; }
        textarea { resize: vertical; min-height: 100px; }
        .checkbox-group { display: flex; align-items: center; gap: 10px; }
        .checkbox-group input { width: auto; }
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
        <a href="index.php?url=admin/services" class="active">Services</a>
        <a href="index.php?url=admin/actualites">Actualités</a>
        <a href="index.php?url=admin/horaires">Horaires</a>
        <a href="index.php?url=logout" class="logout">Se déconnecter</a>
    </div>

    <div class="main">
        <h1><?= $service ? 'Modifier le service' : 'Ajouter un service' ?></h1>
        <div class="card">
            <?php
                $action = $service
                    ? 'index.php?url=admin/service-modifier&id=' . $service->getId()
                    : 'index.php?url=admin/service-ajouter';
            ?>
            <form method="POST" action="<?= $action ?>">
                <div class="form-group">
                    <label for="nom">Nom du service</label>
                    <input type="text" id="nom" name="nom" required
                           value="<?= htmlspecialchars($service ? $service->getNom() : '') ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"><?= htmlspecialchars($service ? $service->getDescription() : '') ?></textarea>
                </div>
                <div class="form-group">
                    <label for="duree_minutes">Durée (en minutes)</label>
                    <input type="number" id="duree_minutes" name="duree_minutes" min="1"
                           value="<?= $service ? $service->getDureeMinutes() : '30' ?>">
                </div>
                <div class="form-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="actif" name="actif" value="1"
                               <?= ($service && $service->isActif()) || !$service ? 'checked' : '' ?>>
                        <label for="actif" style="margin:0">Service actif</label>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <?= $service ? 'Enregistrer les modifications' : 'Ajouter le service' ?>
                    </button>
                    <a href="index.php?url=admin/services" class="btn-annuler">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>