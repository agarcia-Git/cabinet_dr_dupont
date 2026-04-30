<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $actualite ? 'Modifier' : 'Ajouter' ?> une actualité — Cabinet Dr. Dupont</title>
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
        .card { background: white; border-radius: 10px; padding: 30px; max-width: 700px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-size: 13px; font-weight: bold; color: #333; margin-bottom: 6px; }
        input[type="text"], textarea {
            width: 100%; padding: 10px 14px; border: 1px solid #dce3ea;
            border-radius: 6px; font-size: 13px; color: #333;
        }
        input:focus, textarea:focus { outline: none; border-color: #185FA5; }
        textarea { resize: vertical; min-height: 200px; }
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
        <a href="index.php?url=admin/actualites" class="active">Actualités</a>
        <a href="index.php?url=admin/horaires">Horaires</a>
        <a href="index.php?url=logout" class="logout">Se déconnecter</a>
    </div>

    <div class="main">
        <h1><?= $actualite ? 'Modifier l\'actualité' : 'Ajouter une actualité' ?></h1>
        <div class="card">
            <?php
                $action = $actualite
                    ? 'index.php?url=admin/actualite-modifier&id=' . $actualite->getId()
                    : 'index.php?url=admin/actualite-ajouter';
            ?>
            <form method="POST" action="<?= $action ?>">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" required
                           value="<?= htmlspecialchars($actualite ? $actualite->getTitre() : '') ?>">
                </div>
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea id="contenu" name="contenu" required><?= htmlspecialchars($actualite ? $actualite->getContenu() : '') ?></textarea>
                </div>
                <div class="form-group">
                    <label for="image">URL de l'image (optionnel)</label>
                    <input type="text" id="image" name="image"
                           value="<?= htmlspecialchars($actualite ? $actualite->getImage() : '') ?>">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <?= $actualite ? 'Enregistrer les modifications' : 'Ajouter l\'actualité' ?>
                    </button>
                    <a href="index.php?url=admin/actualites" class="btn-annuler">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>