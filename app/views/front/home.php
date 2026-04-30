<?php include __DIR__ . '/../layouts/header.php'; ?>

<!-- Hero -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #185FA5, #0d3d6e);">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold mb-3">Bienvenue au Cabinet Dr. Dupont</h1>
                <p class="lead mb-4">Votre dentiste de confiance à Lyon. Nous vous offrons des soins dentaires de qualité dans un cadre moderne et accueillant.</p>
                <a href="index.php?url=rendez-vous" class="btn btn-light btn-lg fw-bold px-4" style="color:#185FA5; border-radius:25px;">
                    <i class="bi bi-calendar-check"></i> Prendre rendez-vous
                </a>
            </div>
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <i class="bi bi-hospital" style="font-size: 150px; opacity: 0.3;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Horaires -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-4" style="color:#185FA5;">Nos horaires d'ouverture</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead style="background:#185FA5; color:white;">
                                <tr>
                                    <th class="px-4 py-3">Jour</th>
                                    <th class="py-3">Ouverture</th>
                                    <th class="py-3">Fermeture</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($horaires as $horaire) : ?>
                                <tr>
                                    <td class="px-4 fw-semibold"><?= htmlspecialchars($horaire->getJourSemaine()) ?></td>
                                   <td><?= substr($horaire->getHeureOuverture(), 0, 5) ?></td>
                                   <td><?= substr($horaire->getHeureFermeture(), 0, 5) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services rapides -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4" style="color:#185FA5;">Nos services</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 text-center">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <i class="bi bi-emoji-smile fs-1 mb-3" style="color:#185FA5;"></i>
                    <h5>Soins dentaires</h5>
                    <p class="text-muted small">Détartrage, soins, extractions et bien plus.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <i class="bi bi-stars fs-1 mb-3" style="color:#185FA5;"></i>
                    <h5>Orthodontie</h5>
                    <p class="text-muted small">Corrections dentaires pour adultes et enfants.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <i class="bi bi-shield-check fs-1 mb-3" style="color:#185FA5;"></i>
                    <h5>Implantologie</h5>
                    <p class="text-muted small">Pose d'implants dentaires de haute qualité.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="index.php?url=services" class="btn btn-outline-primary px-4" style="border-radius:25px; color:#185FA5; border-color:#185FA5;">
                Voir tous nos services
            </a>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 text-white text-center" style="background:#185FA5;">
    <div class="container">
        <h2 class="fw-bold mb-3">Prêt à prendre soin de votre sourire ?</h2>
        <p class="lead mb-4">Réservez votre consultation en quelques clics.</p>
        <a href="index.php?url=rendez-vous" class="btn btn-light btn-lg fw-bold px-5" style="color:#185FA5; border-radius:25px;">
            <i class="bi bi-calendar-check"></i> Prendre rendez-vous
        </a>
    </div>
</section>

<?php include __DIR__ . '/../layouts/footer.php'; ?>