<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" type="text/css" href="/css/style.css"> 

  <!-- Font Family Nunito -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- End Font Family Nunito -->

  <style>
      html {
        scroll-behavior: smooth;
      }
  </style>
</head>
<body class="font-sans">
    <?= $this->renderSection('content') ?>
</body>
</html>