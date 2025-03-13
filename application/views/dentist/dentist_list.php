<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/dentist_list.css'); ?>">
    <title>Lista de Dentistas</title>
</head>
<body>
    <h1>Lista de Dentistas</h1>
    <a href="<?= site_url('dentist/nuevo_scraping'); ?>">Nuevo Scraping</a>
    <a href="<?= site_url('dentist/exportar_csv'); ?>" class="btn">Descargar Lista</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dentistas as $dentista): ?>
            <tr>
                <td><?= htmlspecialchars($dentista->id); ?></td>
                <td><?= htmlspecialchars($dentista->full_name); ?></td>
                <td><?= htmlspecialchars($dentista->address); ?></td>
                <td><?= htmlspecialchars($dentista->phone); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
