<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Scraping</title>
</head>
<body>
    <h1>Nuevo Scraping</h1>

    <section>
        <form method="post" action="<?= site_url('dentist/iniciar_scraping'); ?>">
            <label for="url">Ingrese la URL:</label>
            <input type="url" id="url" name="url" required autocomplete="off">
            <button type="submit">Iniciar Scraping</button>
        </form>
    </section>
</body>
</html>
