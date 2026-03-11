<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login | AdminLTE 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Fonts -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
          crossorigin="anonymous"
          media="print"
          onload="this.media='all'" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          crossorigin="anonymous" />

    <!-- OverlayScrollbars -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
          crossorigin="anonymous" />

    <!-- AdminLTE (from public/dist) -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.css') ?>" />
</head>
<body class="login-page bg-body-secondary">

<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1 class="mb-0"><b>OJT</b>2026</h1>
        </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <?php if (session('message') !== null) : ?>
                <div class="alert alert-success" role="alert"><?= session('message') ?></div>
            <?php endif ?>

             <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>
            <div class="input-group mb-1">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
                 <label for="floatingUsernameInput"><?= lang('Auth.username') ?></label>
              </div>
              <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
            <div class="input-group mb-1">
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
                <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
              </div>
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            <!--begin::Row-->
            <div class="row">
              <div class="col-8 d-inline-flex align-items-center">
                  <!-- Remember me -->
                    <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                                <?= lang('Auth.rememberMe') ?>
                            </label>
                        </div>
                    <?php endif; ?>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.login') ?></button>

                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
        
          <!-- /.social-auth-links -->
          <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
        

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('dist/js/adminlte.js') ?>"></script>
</body>
</html>