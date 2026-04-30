<?php include __DIR__ . '/../layouts/header.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="index.php?url=actualites" class="btn btn-sm btn-outline-secondary mb-4">
                    <i class="bi bi-arrow-left"></i> Retour aux actualités
                </a>
                <?php if ($actualite) : ?>
                    <?php if ($actualite->getImage()) : ?>
                    <img src="<?= htmlspecialchars($actualite->getImage()) ?>"
                         class="img-fluid rounded mb-4 w-100"
                         style="max-height:400px; object-fit:cover;"
                         alt="<?= htmlspecialchars($actualite->getTitre()) ?>">
                    <?php endif; ?>
                    <small class="text-muted">
                        <i class="bi bi-calendar3"></i>
                        <?= date('d/m/Y', strtotime($actualite->getDatePublication())) ?>
                    </small>
                    <h1 class="fw-bold mt-2 mb-4" style="color:#185FA5;">
                        <?= htmlspecialchars($actualite->getTitre()) ?>
                    </h1>
                    <div class="text-muted" style="line-height:1.8;">
                        <?= nl2br(htmlspecialchars($actualite->getContenu())) ?>
                    </div>
                    <hr class="my-5">
                    <div class="text-center">
                        <a href="index.php?url=rendez-vous" class="btn btn-lg fw-bold text-white px-5"
                           style="background:#185FA5; border-radius:25px;">
                            <i class="bi bi-calendar-check"></i> Prendre rendez-vous
                        </a>
                    </div>
                <?php else : ?>
                    <p class="text-muted">Actualité introuvable.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../layouts/footer.php'; ?>