<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/new_scraping.css'); ?>">
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
    <br>
    <section>
        <table>
            <h2>URLs Amigables:</h2>
            <tr>
                <td>copba10.com.ar/profesionales</td>
            </tr>
            <tr>
                <td>https://</td>
            </tr>
        </table>
    </section>
</body>
</html>
