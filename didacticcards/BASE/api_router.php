<?php require_once 'layout/header.phtml'; ?>

<main class="content-wrapper">
    <section class="welcome-container">
        <div class="welcome-text">
            <h1><?= htmlspecialchars($flashcard->question, ENT_QUOTES, 'UTF-8') ?></h1>
            <p><strong>Tema:</strong> <?= htmlspecialchars($flashcard->topic, ENT_QUOTES, 'UTF-8') ?></p>
            <p><?= htmlspecialchars($flashcard->answer, ENT_QUOTES, 'UTF-8') ?></p>
            <a href="<?= BASE_URL ?>flashcards" class="btn-shop">Volver a tarjetas</a>
        </div>
    </section>
</main>

<?php require_once 'layout/footer.phtml'; ?>
