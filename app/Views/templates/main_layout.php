
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Auren' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="assets/img/icon.png">
  <link rel="stylesheet" href="assets/css/auren_style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title>Auren</title>
</head>
<body class = "comercializacion" >
    <header>
        <!-- Menú de navegación -->
        <?= view('components/navbar') ?>
    </header>
    
    <main>
        <?= $content ?? '' ?>
    </main>
    
    <footer>
        <!-- Pie de página -->
        <?= view('components/footer') ?>
    </footer>
    
      <!-- Solo el JS de Bootstrap (funcionalidad de carrusel) -->
    <script src="assets/js/bootstrap.bundle.min.js" integrity="" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>