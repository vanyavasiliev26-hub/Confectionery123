<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo e(route('welcome')); ?>">Кусочек счастья</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Переключатель навигации">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Каталог</a>
        <a class="nav-link" href="#">Контакты</a>
        <a class="nav-link" href="#">Акции</a>
        <a class="nav-link" href="<?php echo e(route('about')); ?>">О нас</a>
        <a class="nav-link" href="<?php echo e(route('login')); ?>">Вход</a>
      </div>
    </div>
  </div>
</nav>
    </header>
</body>
</html><?php /**PATH C:\OSPanel\domains\localhost\resources\views/layouts/main.blade.php ENDPATH**/ ?>