<?php
include "include/antet.php";
include "include/func.php";

$townId = isset($_GET['town']) ? (int) $_GET['town'] : 0;

if (!isset($_SESSION["user"][0]) || $townId <= 0)
{
    header('Location: towns.php');
    exit;
}

$town = town($townId);
if (!is_array($town) || empty($town[0]) || (int)($town[1] ?? 0) !== (int)$_SESSION["user"][0])
{
    header('Location: towns.php');
    exit;
}

check_a($townId);
check_t($townId);
check_w($townId);
check_u($townId);
check_uup($townId);
check_c($townId, $_SESSION["user"][10]);
check_r($townId);

$town = town($townId);
$faction = faction($_SESSION["user"][10]);
$buildings = buildings($_SESSION["user"][10]);
$population = getpopulation($_SESSION["user"][0]);
$cq = get_c($townId);
$iaq = get_ia($townId);
$b_names = array();
for ($i=0; $i<22; $i++) $b_names[$i] = $buildings[$i][2] ?? '';
$fl_data = "<object width='635' height='575'><embed src='".$imgs.$fimgs."town.swf' type='application/x-shockwave-flash' width='650' height='575' FlashVars='tid=".$town[0]."&tname=".str_replace("'", "`", $town[2])."&data=".$town[8]."&w=".$town[16]."&bnames=".implode("/", $b_names)."&res=".$town[10]."&lim=".$town[11]."&upkeep=".($town[3]+$town[12])."&morale=".$town[5]."&prod=".$town[9]."'></embed></object>";
$data = explode("-", $town[8]);
$land = explode("/", $town[13]);
$land[0] = explode("-", $land[0] ?? '');
$land[1] = explode("-", $land[1] ?? '');
$land[2] = explode("-", $land[2] ?? '');
$land[3] = explode("-", $land[3] ?? '');
$res = explode("-", $town[10]);
$lim = explode("-", $town[11]);
$prod = explode("-", $town[9]);
if (($prod[0] ?? 0)-$town[3]-$town[12] < 5) $prod[0] = $town[3]+$town[12]+5;
?>
<?php include("include/town/java.php");?>
<title><?=$title?></title>
<link href="template/index/favicon.ico" rel="shortcut icon">

<head>
<body class="q_body">