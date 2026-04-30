<?php include __DIR__ . '/../layouts/header.php'; ?>

<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #185FA5, #0d3d6e);">
    <div class="container py-3">
        <h1 class="fw-bold display-6">Actualités</h1>
        <p class="lead">Les dernières nouvelles du cabinet et du secteur médical</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if (empty($actualites)) : ?>
            <div class="text-center py-5">
                <i class="bi bi-newspaper fs-1 text-muted"></i>
                <p class="text-muted mt-3">Aucune actualité disponible pour le moment.</p>
            </div>
        <?php else : ?>
        <div class="row g-4">
            <?php foreach ($actualites as $actualite) : ?>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <?php if ($actualite->getImage()) : ?>
                    <img src="<?= htmlspecialchars($actualite->getImage()) ?>" 
                         class="card-img-top" alt="<?= htmlspecialchars($actualite->getTitre()) ?>"
                         style="height:200px; object-fit:cover;">
                    <?php else : ?>
                    <div class="d-flex align-items-center justify-content-center"
                         style="height:200px; background:#f0f4f8;">
                        <i class="bi bi-newspaper fs-1" style="color:#185FA5; opacity:0.4;"></i>
                    </div>
                    <?php endif; ?>
                    <div class="card-body p-4">
                        <small class="text-muted">
                            <i class="bi bi-calendar3"></i> 
                            <?= date('d/m/Y', strtotime($actualite->getDatePublication())) ?>
                        </small>
                        <h5 class="fw-bold mt-2 mb-3"><?= htmlspecialchars($actualite->getTitre()) ?></h5>
                        <p class="text-muted small">
                            <?= htmlspecialchars(substr($actualite->getContenu(), 0, 120)) ?>...
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0 px-4 pb-4">
                        <a href="index.php?url=actualite&id=<?= $actualite->getId() ?>" 
                           class="btn btn-sm fw-bold"
                           style="background:#185FA5; color:white; border-radius:20px; padding: 6px 16px;">
                            Lire la suite <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/../layouts/footer.php'; ?>