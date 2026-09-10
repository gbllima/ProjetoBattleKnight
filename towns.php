<?php
include "include/antet.php";
include "include/func.php";

if (!isset($_SESSION["user"][0])) {
    header('Location: login.php');
    exit;
}

$towns = towns($_SESSION["user"][0]);
if (!is_array($towns)) {
    $towns = [];
}
$twnCount = count($towns);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($lang['towns'] ?? 'Cidades', ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars(($imgs ?? '').($fimgs ?? '').'default.css', ENT_QUOTES, 'UTF-8'); ?>">
    <link href="template/index/favicon.ico" rel="shortcut icon">
</head>
<body class="q_body">
<div align="center">
    <h2><?php echo htmlspecialchars($lang['towns'] ?? 'Cidades', ENT_QUOTES, 'UTF-8'); ?></h2>

    <p>
        [<a class="q_link" href="create.php"><?php echo htmlspecialchars($lang['createTown'] ?? 'Criar cidade', ENT_QUOTES, 'UTF-8'); ?></a>]
        &nbsp;
        [<a class="q_link" href="index.php">Início</a>]
    </p>

    <?php if ($twnCount === 0): ?>
        <p>Você ainda não possui uma cidade.</p>
        <p><a class="q_link" href="create.php">Criar minha primeira cidade</a></p>
    <?php else: ?>
        <table class="q_table" style="border-collapse: collapse" width="600" border="1">
            <tr>
                <td class="head_table"><?php echo htmlspecialchars($lang['townName'] ?? 'Nome da cidade', ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="head_table"><?php echo htmlspecialchars($lang['population'] ?? 'População', ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="head_table"><?php echo htmlspecialchars($lang['coords'] ?? 'Coordenadas', ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="head_table"><?php echo htmlspecialchars($lang['abandon'] ?? 'Abandonar', ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="head_table"><?php echo htmlspecialchars($lang['purge'] ?? 'Remover', ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <?php foreach ($towns as $townRow): ?>
                <?php
                if (!isset($townRow[0])) {
                    continue;
                }
                $townId = (int)$townRow[0];
                $coords = town_xy($townId);
                $x = is_array($coords) && isset($coords[0]) ? $coords[0] : '?';
                $y = is_array($coords) && isset($coords[1]) ? $coords[1] : '?';
                $townName = $townRow[2] ?? ('Cidade #' . $townId);
                $population = $townRow[3] ?? 0;
                ?>
                <tr>
                    <td><a class="q_link" href="town.php?town=<?php echo $townId; ?>"><?php echo htmlspecialchars((string)$townName, ENT_QUOTES, 'UTF-8'); ?></a></td>
                    <td><?php echo htmlspecialchars((string)$population, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a class="q_link" href="map.php?x=<?php echo urlencode((string)$x); ?>&amp;y=<?php echo urlencode((string)$y); ?>">(<?php echo htmlspecialchars((string)$x, ENT_QUOTES, 'UTF-8'); ?>, <?php echo htmlspecialchars((string)$y, ENT_QUOTES, 'UTF-8'); ?>)</a></td>
                    <td>[<a class="q_link" href="abandon.php?town=<?php echo $townId; ?>"><?php echo htmlspecialchars($lang['abandon'] ?? 'Abandonar', ENT_QUOTES, 'UTF-8'); ?></a>]</td>
                    <td>[<a class="q_link" href="purge.php?town=<?php echo $townId; ?>"><?php echo htmlspecialchars($lang['purge'] ?? 'Remover', ENT_QUOTES, 'UTF-8'); ?></a>]</td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p>[<a class="q_link" href="ch_capital.php"><?php echo htmlspecialchars($lang['changeCap'] ?? 'Alterar capital', ENT_QUOTES, 'UTF-8'); ?></a>]</p>
    <?php endif; ?>
</div>
</body>
</html>
