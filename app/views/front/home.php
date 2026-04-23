<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet Dr. Dupont</title>
</head>
<body>
    <h1>Bienvenue au Cabinet Dr. Dupont</h1>
    <p>Votre dentiste de confiance à Lyon.</p>
    <a href="rendez-vous">Prendre rendez-vous</a>

    <h2>Nos horaires</h2>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Ouverture</th>
            <th>Fermeture</th>
        </tr>
        <?php foreach ($horaires as $horaire) : ?>
        <tr>
            <td><?= $horaire->getJourSemaine() ?></td>
            <td><?= $horaire->getHeureOuverture() ?></td>
            <td><?= $horaire->getHeureFermeture() ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>