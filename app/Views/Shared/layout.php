<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>OJT2026</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />

    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.css') ?>" />
    
    <!-- Overlayscrollbars -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />

    <style>
        :root {
            --primary-color: #004a99;
            --secondary-color: #6c757d;
        }
        
        /* Custom sidebar styles to match aesthetic */
        .app-sidebar {
            background-color: #1a2226 !important;
        }

        [data-bs-theme="dark"] .app-sidebar {
            background-color: #1a2226 !important;
        }
        
        .sidebar-menu .nav-link.active {
            background-color: var(--primary-color) !important;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            color: #fff !important;
        }
        
        .nav-header {
            font-size: 0.75rem !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700 !important;
            color: #4b646f !important;
            padding: 1.5rem 1rem 0.5rem !important;
        }
        
        .sidebar-brand {
            background-color: #1a2226 !important;
            border-bottom: 1px solid #4b646f;
        }
        
        .sidebar-brand .brand-link {
            color: #fff;
        }

        .app-header {
             border-bottom: none !important;
             box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        }
    </style>
    <?php echo $this->renderSection('styles'); ?>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav nav-underline">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="fas fa-bars"></i>
              </a>
            </li>
            <?= $this->renderSection('navbar_links') ?>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="/dist/images/Icon-user.png"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline"><?php echo esc(auth()->user()->username ?? 'User'); ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end rounded-0 border-0 shadow">
                <!--begin::User Image-->
                <li class="user-header bg-primary">
                  <img
                    src="/dist/images/Icon-user.png"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    <?php echo esc(auth()->user()->username ?? 'User'); ?>
                    <small><?php echo esc(auth()->user()->email ?? ''); ?></small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Footer-->
                <li class="user-footer bg-light">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  <a href="/logout" class="btn btn-danger btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="/" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="/dist/images/Logo.png"
              class="brand-image opacity-75 shadow"
              alt="Logo"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text">OJT2026</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column nav-flat nav-compact"
              data-lte-toggle="treeview"
              role="menu"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              
              <li class="nav-item">
                <a href="/administrator/dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-header">ADMINISTRATOR</li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Administrator
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                    <a href="/administrator/users" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Users</p>
                    </a>
                  </li>
                </ul>
              </li>

              

              <li class="nav-header">CASHIER</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cash-register text-success"></i>
                  <p>feature</p>
                </a>
              </li>

              <li class="nav-header">HUMAN RESOURCES</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users text-info"></i>
                  <p>feature</p>
                </a>
              </li>

              

              <li class="nav-header">Learning & Development</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-archive text-danger"></i>
                  <p>feature</p>
                </a>
              </li>

            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
       
        <!--begin::App Content-->
        <div class="app-content">
          <?php echo $this->renderSection('content'); ?>
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">
          <b>Version</b> 1.0
        </div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          <a href="https://r6.emb.gov.ph" class="text-decoration-none">Environmental Management Bureau VI</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?= base_url('dist/js/adminlte.js') ?>" ></script>

    <!--end::Required Plugin(AdminLTE)-->
    <?php echo $this->renderSection('scripts'); ?>
    <!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
