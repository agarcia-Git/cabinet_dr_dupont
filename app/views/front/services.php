<?php include __DIR__ . '/../layouts/header.php'; ?>

<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #185FA5, #0d3d6e);">
    <div class="container py-3">
        <h1 class="fw-bold display-6">Nos services</h1>
        <p class="lead">Découvrez tous les soins proposés par le Cabinet Dr. Dupont</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($services as $service) : ?>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <i class="bi bi-tooth fs-1 mb-3" style="color:#185FA5;"></i>
                    <h5 class="fw-bold"><?= htmlspecialchars($service->getNom()) ?></h5>
                    <p class="text-muted small"><?= htmlspecialchars($service->getDescription()) ?></p>
                    <span class="badge mt-2" style="background:#185FA5;">
                        <i class="bi bi-clock"></i> <?= $service->getDureeMinutes() ?> min
                    </span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="index.php?url=rendez-vous" class="btn btn-lg fw-bold text-white px-5"
               style="background:#185FA5; border-radius:25px;">
                <i class="bi bi-calendar-check"></i> Prendre rendez-vous
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../layouts/footer.php'; ?>