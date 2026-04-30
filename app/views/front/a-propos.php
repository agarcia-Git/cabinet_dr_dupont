<?php include __DIR__ . '/../layouts/header.php'; ?>

<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #185FA5, #0d3d6e);">
    <div class="container py-3">
        <h1 class="fw-bold display-6">À propos</h1>
        <p class="lead">Découvrez le Dr. Dupont et son équipe</p>
    </div>
</section>

<!-- Dr. Dupont -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-4 text-center">
                <i class="bi bi-person-circle" style="font-size:120px; color:#185FA5;"></i>
            </div>
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3" style="color:#185FA5;">Dr. Jean Dupont</h2>
                <p class="text-muted mb-3">Chirurgien-dentiste diplômé de la Faculté de Médecine de Lyon, le Dr. Dupont exerce depuis plus de 15 ans avec passion et dévouement.</p>
                <p class="text-muted mb-4">Spécialisé en implantologie et orthodontie, il met un point d'honneur à offrir des soins de qualité dans un environnement moderne et accueillant.</p>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card border-0 bg-light text-center p-3">
                            <h4 class="fw-bold" style="color:#185FA5;">15+</h4>
                            <small class="text-muted">Années d'expérience</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 bg-light text-center p-3">
                            <h4 class="fw-bold" style="color:#185FA5;">2000+</h4>
                            <small class="text-muted">Patients satisfaits</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 bg-light text-center p-3">
                            <h4 class="fw-bold" style="color:#185FA5;">5</h4>
                            <small class="text-muted">Spécialités</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Qualifications -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-center mb-5" style="color:#185FA5;">Formations & Qualifications</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <i class="bi bi-mortarboard-fill fs-2 mb-3" style="color:#185FA5;"></i>
                    <h6 class="fw-bold">Diplôme d'État</h6>
                    <p class="text-muted small">Chirurgien-dentiste — Faculté de Médecine de Lyon, 2008</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <i class="bi bi-award-fill fs-2 mb-3" style="color:#185FA5;"></i>
                    <h6 class="fw-bold">Spécialisation Implantologie</h6>
                    <p class="text-muted small">Formation avancée en implants dentaires — Paris, 2012</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <i class="bi bi-patch-check-fill fs-2 mb-3" style="color:#185FA5;"></i>
                    <h6 class="fw-bold">Orthodontie</h6>
                    <p class="text-muted small">Certification en orthodontie adulte et pédiatrique — 2015</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Équipe -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-5" style="color:#185FA5;">Notre équipe</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-3 text-center">
                <div class="card border-0 shadow-sm p-4">
                    <i class="bi bi-person-circle fs-1 mb-3" style="color:#185FA5;"></i>
                    <h6 class="fw-bold">Marie Lambert</h6>
                    <small class="text-muted">Assistante dentaire</small>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card border-0 shadow-sm p-4">
                    <i class="bi bi-person-circle fs-1 mb-3" style="color:#185FA5;"></i>
                    <h6 class="fw-bold">Sophie Martin</h6>
                    <small class="text-muted">Secrétaire médicale</small>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card border-0 shadow-sm p-4">
                    <i class="bi bi-person-circle fs-1 mb-3" style="color:#185FA5;"></i>
                    <h6 class="fw-bold">Pierre Blanc</h6>
                    <small class="text-muted">Assistant dentaire</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 text-white text-center" style="background:#185FA5;">
    <div class="container">
        <h2 class="fw-bold mb-3">Prenez soin de votre sourire</h2>
        <p class="lead mb-4">Consultez le Dr. Dupont et son équipe dès aujourd'hui.</p>
        <a href="index.php?url=rendez-vous" class="btn btn-light btn-lg fw-bold px-5"
           style="color:#185FA5; border-radius:25px;">
            <i class="bi bi-calendar-check"></i> Prendre rendez-vous
        </a>
    </div>
</section>

<?php include __DIR__ . '/../layouts/footer.php'; ?>