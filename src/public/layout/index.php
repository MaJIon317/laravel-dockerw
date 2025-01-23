<?php require_once('config/function.php'); ?>

<!DOCTYPE html>
  <html lang="ru" style="height: 100%;">
    <head style="height: 100%;">
      <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta http-equiv="Content-Language" content="en">
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		  <meta name="msapplication-tap-highlight" content="no">
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> 
      <meta http-equiv="cache-control" content="max-age=0" /> 
      <meta http-equiv="Pragma" content="no-cache" /> 
      <meta http-equiv="Expires" content="0" /> 
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		  <base href="<?php echo $get_url; ?>">
      <meta name="robots" content="noindex,nofollow">
      <link rel="icon" type="image/png" href="https://webdement.ru/storage/app/media/UHQ8CRwg.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body style="display: flex;flex-flow: column;height: 100%;width: 100%;">
      <header>
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between py-3 mb-3 border-bottom">
              <a href="https://webdement.ru" class="d-flex align-items-center mb-2 text-dark text-decoration-none pe-3">
                <span style="line-height: 40px;display: flex;align-items: center;"><span style="background-color: #011756;color: #fff;width: 45px;height: 45px;display: inline-block;border-radius: 100%;line-height: 45px;font-size: 12px;text-align: center;letter-spacing: 0px;">center</span><span style="font-weight: 500;margin-left: 6px;font-size: 20px;color: #011756;">webdement</span></span>
              </a>
              <ul class="nav nav-pills">
                <li class="nav-item"><a href="https://webdement.ru" class="nav-link active" aria-current="page" target="_blank">Разработка веб-приложений</a></li>
              </ul>
          </div>
        </div>
      </header>
      <main>
        <div class="container">
          <div class="row">
            <ul class="nav flex-column">
              <?php $count = 1; ?>
              <?php foreach ($links as $key => $link) { ?>
              <?php if (is_array($link)) { ?>
              <li class="nav-item"><a href="<?php echo $link['href']; ?>" target="_blank" rel="noopener noreferrer" class="nav-link"><?php echo $count; ?>. <?php echo $link['name']; ?></a></li>
              <?php $count++; ?>
			  <?php } ?>
              <?php } ?>
            </ul>
          </div>
        </div>
      </main> 
		  <footer class="py-3 mt-auto">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="https://webdement.ru" class="nav-link px-2 text-muted" target="_blank">Портфолио</a></li>
          <li class="nav-item"><a href="https://t.me/mr_werook" class="nav-link px-2 text-muted" target="_blank">Написать в Телеграмм</a></li>
        </ul>
        <p class="text-center text-muted">©2017-<?php echo date('Y'); ?>  Кашпуренко В.В. - Разработка Веб-приложений.</p>
      </footer>
  </body>
</html>