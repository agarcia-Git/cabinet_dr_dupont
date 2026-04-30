<?php include __DIR__ . '/../layouts/header.php'; ?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h1 class="fw-bold mb-2 text-center" style="color:#185FA5;">
                    <i class="bi bi-calendar-check"></i> Prendre rendez-vous
                </h1>
                <p class="text-center text-muted mb-5">Remplissez le formulaire ci-dessous et nous confirmerons votre rendez-vous rapidement.</p>

                <div class="card border-0 shadow-sm p-4">
                    <form method="POST" action="index.php?url=rendez-vous-soumission" id="formRdv" novalidate> 
                        
                        <h5 class="fw-bold mb-3" style="color:#185FA5;">Vos informations</h5>
                        <div class="row g-3 mb-4">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nom *</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Prénom *</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Téléphone *</label>
                                <input type="tel" name="telephone" class="form-control" required
                                       pattern="[0-9]{10}" title="10 chiffres sans espaces">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date de naissance *</label>
                                <input type="date" name="date_naissance" class="form-control" required
                                       max="<?= date('Y-m-d') ?>">
                            </div>

                            <div class="col-12">
                                         <label class="form-label fw-semibold">Adresse  *</label>
                                        <input type="text" name="adresse" class="form-control" required
                                            placeholder="Ex: 12 rue de la Paix, Lyon">
                             </div>
                        

                        <h5 class="fw-bold mb-3" style="color:#185FA5;">Votre rendez-vous</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Type de consultation *</label>
                                <select name="id_service" class="form-select" required>
                                    <option value="">-- Choisir un service --</option>
                                    <?php foreach ($services as $service) : ?>
                                    <option value="<?= $service->getId() ?>">
                                        <?= htmlspecialchars($service->getNom()) ?>
                                        (<?= $service->getDureeMinutes() ?> min)
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date souhaitée *</label>
                                <input type="date" name="date_rdv" class="form-control" required
                                       min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Heure souhaitée *</label>
                                <select name="heure_rdv" class="form-select" required>
                                    <option value="">-- Choisir une heure --</option>
                                    <?php
                                    $heures = ['09:00','09:30','10:00','10:30','11:00','11:30',
                                               '14:00','14:30','15:00','15:30','16:00','16:30','17:00'];
                                    foreach ($heures as $h) : ?>
                                    <option value="<?= $h ?>"><?= $h ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Commentaire (optionnel)</label>
                                <textarea name="commentaire" class="form-control" rows="3"
                                          placeholder="Précisez si nécessaire..."></textarea>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg fw-bold text-white"
                                    style="background:#185FA5; border-radius:25px;">
                                <i class="bi bi-calendar-check"></i> Confirmer ma demande
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('formRdv').addEventListener('submit', function(e) {
    let erreurs = [];

    // Nom
    const nom = document.querySelector('input[name="nom"]').value.trim();
    if (nom.length < 2) erreurs.push("Le nom doit contenir au moins 2 caractères.");

    // Prénom
    const prenom = document.querySelector('input[name="prenom"]').value.trim();
    if (prenom.length < 2) erreurs.push("Le prénom doit contenir au moins 2 caractères.");

    // Email
    const email = document.querySelector('input[name="email"]').value.trim();
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regexEmail.test(email)) erreurs.push("L'adresse email n'est pas valide.");

    // Téléphone
    const tel = document.querySelector('input[name="telephone"]').value.trim();
    const regexTel = /^[0-9]{10}$/;
    if (!regexTel.test(tel)) erreurs.push("Le téléphone doit contenir 10 chiffres.");

    // Date de naissance
    const dateNaissance = document.querySelector('input[name="date_naissance"]').value;
    if (!dateNaissance) erreurs.push("La date de naissance est obligatoire.");

    // Adresse
    const adresse = document.querySelector('input[name="adresse"]').value.trim();
    if (adresse.length < 5) erreurs.push("L'adresse doit contenir au moins 5 caractères.");

    // Service
    const service = document.querySelector('select[name="id_service"]').value;
    if (!service) erreurs.push("Veuillez choisir un type de consultation.");

    // Date RDV
    const dateRdv = document.querySelector('input[name="date_rdv"]').value;
    if (!dateRdv) erreurs.push("La date du rendez-vous est obligatoire.");

    // Heure RDV
    const heureRdv = document.querySelector('select[name="heure_rdv"]').value;
    if (!heureRdv) erreurs.push("Veuillez choisir une heure.");

    // Affichage des erreurs
    const existingAlert = document.getElementById('alertErreurs');
    if (existingAlert) existingAlert.remove();

    if (erreurs.length > 0) {
        e.preventDefault();
        const alert = document.createElement('div');
        alert.id = 'alertErreurs';
        alert.className = 'alert alert-danger mt-4';
        alert.innerHTML = '<strong>Veuillez corriger les erreurs suivantes :</strong><ul class="mb-0 mt-2">' 
            + erreurs.map(err => `<li>${err}</li>`).join('') 
            + '</ul>';
        document.getElementById('formRdv').prepend(alert);
        window.scrollTo({top: document.getElementById('formRdv').offsetTop - 20, behavior: 'smooth'});
    }
});
</script>


<?php include __DIR__ . '/../layouts/footer.php'; ?>