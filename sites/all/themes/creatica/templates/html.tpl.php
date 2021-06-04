<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php print $styles; ?>


<!-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=disabled" /> -->

<link href='//fonts.googleapis.com/css?family=Exo+2:400,500,300,600,700,800,300italic,400italic,500italic,600italic,700italic&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
<script src="//code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $scripts; ?>
  <?php print $page_bottom; ?>
 
 
</body>
</html>
