<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFLVM - <?php echo $titulo; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/build/css/app.css">
    <!-- <link rel="stylesheet" href="@sweetalert2/theme-bootstrap-4/bootstrap-4.css"> -->

</head>
<body class="dashboard">
        <?php 
            include_once __DIR__ .'/templates/admin-header.php';
        ?>
        <div class="dashboard__grid">
            <?php
                include_once __DIR__ .'/templates/admin-sidebar.php';  
            ?>

            <main class="dashboard__contenido">
                <?php 
                    echo $contenido; 
                ?> 
            </main>
        </div>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <!-- version anterior de las graficas -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.js" integrity="sha512-64PuQoA1/rGxeXwhWJRNZl25TjBPhQWeQ6x8h6UC54gQT7xFvTio//dLKg2MiAc3/4Tf+uoLKPzl+QuX87fssA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <script src="/build/js/main.min.js" defer></script>

    <!-- <script src="/build/js/tags.js" defer></script>
    <script src="/build/js/horas.js" defer></script>
    <script src="/build/js/ponentes.js" defer></script> -->

</body>
</html>