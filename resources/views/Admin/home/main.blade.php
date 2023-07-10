<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css_b/bootstrap.min.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="{{ asset('css_b/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css_b/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <title><?= $title ?></title>
  </head>
  <body>
    <!-- top navigation bar -->
    <?= $header ?>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <?= $left_menu ?>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
         <?= $home ?>
      </div>
    </main>
    <script src="{{ asset('./js_b/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('./js_b/jquery-3.5.1.js') }}"></script>
    <!-- <script src="./js/jquery.dataTables.min.js"></script> -->
    <script src="{{ asset('./js_b/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('./js_b/script.js') }}"></script>
  </body>
</html>
