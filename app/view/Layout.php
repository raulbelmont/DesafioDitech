<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Raul Belmonte">
  <meta name="description" content="<?php echo $this->getDescription(); ?>">
  <meta name="keywords" content="<?php echo $this->getKeywords(); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->getTitle(); ?></title>
  <link rel="stylesheet" href="<?php echo DIRCSS.'Style.css'; ?>">
  <link rel="stylesheet" href="<?php echo DIRCSS.'bootstrap/bootstrap.css'; ?>">
  <?php $this->addHead(); ?>
</head>
<body class="container-fluid">

  <header>
    <?php $this->addHeader(); ?>
  </header>

  <main>
    <div class="row breadcrumb py-3">
      <?php
        use Src\classes\ClassBreadcrumb;
        $Breadcrumbs = new ClassBreadcrumb();
        $Breadcrumbs->addBreadcrumb();
      ?>
    </div>
    <?php $this->addMain(); ?>
  </main>

  <footer class="Footer">
    <script src="<?php echo DIRJS.'jquery/jquery.js'; ?>"></script>
    <script src="<?php echo DIRJS.'popper/popper.js'; ?>"></script>
    <script src="<?php echo DIRJS.'bootstrap/bootstrap.js'; ?>"></script>
    <?php $this->addFooter(); ?>
  </footer>
</body>
</html>