<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">
    <title>Tarjetas didácticas</title>
</head>
<body>
  <header class="main-header">
    <h1>Didactic Cards</h1>
    <nav class="nav-bar">
        <ul class="nav-list">
            <li><a href="<?= BASE_URL ?>home">Home</a></li>
            <li><a href="<?= BASE_URL ?>flashcards">Tarjetas</a></li>
            <?php if (isset($_SESSION['USER_ID'])) { ?>
                <li><a href="<?= BASE_URL ?>agregar-flashcard">Agregar tarjeta</a></li>
                <li><a href="<?= BASE_URL ?>categorias">Administrar categorias</a></li>
                <li><a href="<?= BASE_URL ?>productos">Administrar productos</a></li>
                <li><a href="<?= BASE_URL ?>logout">Cerrar Sesión</a></li> 
            <?php } else { ?>
                <li><a href="<?= BASE_URL ?>login">Iniciar Sesión</a></li>
            <?php } ?>
        </ul>
    </nav>
  </header>
