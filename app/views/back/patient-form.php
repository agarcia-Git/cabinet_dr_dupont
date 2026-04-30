<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $patient ? 'Modifier' : 'Ajouter' ?> un patient — Cabinet Dr. Dupont</title>
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
        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], textarea {
            width: 100%; padding: 10px 14px; border: 1px solid #dce3ea;
            border-radius: 6px; font-size: 13px; color: #333;
            transition: border 0.2s;
        }
        input:focus, textarea:focus { outline: none; border-color: #185FA5; }
        textarea { resize: vertical; min-height: 80px; }
        .form-actions { display: flex; gap: 12px; margin-top: 24px; }
        .btn-submit { padding: 10px 24px; background: #185FA5; color: white; border: none; border-radius: 6px; font-size: 13px; cursor: pointer; }
        .btn-submit:hover { background: #1350a0; }
        .btn-annuler { padding: 10px 24px; background: #f0f4f8; color: #555; border: none; border-radius: 6px; font-size: 13px; cursor: pointer; text-decoration: none; }
        .logout { display: block; margin: 20px; padding: 10px; background: rgba(255,255,255,0.1); border-radius: 6px; text-align: center; color: white; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Cabinet Dr. Dupont</h2>
        <a href="index.php?url=admin">Tableau de bord</a>
        <a href="index.php?url=admin/rendez-vous">Rendez-vous</a>
        <a href="index.php?url=admin/patients" class="active">Patients</a>
        <a href="index.php?url=admin/actualites">Actualités</a>
        <a href="index.php?url=admin/horaires">Horaires</a>
        <a href="index.php?url=logout" class="logout">Se déconnecter</a>
    </div>

    <div class="main">
        <h1><?= $patient ? 'Modifier le patient' : 'Ajouter un patient' ?></h1>
        <div class="card">
            <?php
                $action = $patient
                    ? 'index.php?url=admin/patient-modifier&id=' . $patient->getId()
                    : 'index.php?url=admin/patient-ajouter';
            ?>
            <form method="POST" action="<?= $action ?>">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" required
                           value="<?= htmlspecialchars($patient?->getNom() ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" required
                           value="<?= htmlspecialchars($patient?->getPrenom() ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required
                           value="<?= htmlspecialchars($patient?->getEmail() ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="tel" id="telephone" name="telephone"
                           value="<?= htmlspecialchars($patient?->getTelephone() ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance"
                           value="<?= htmlspecialchars($patient?->getDateNaissance() ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <textarea id="adresse" name="adresse"><?= htmlspecialchars($patient?->getAdresse() ?? '') ?></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <?= $patient ? 'Enregistrer les modifications' : 'Ajouter le patient' ?>
                    </button>
                    <a href="index.php?url=admin/patients" class="btn-annuler">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>