<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link rel="icon" href="/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Open+Sans:300,400,600,700"] },
        custom: {
          families: [
            "Flaticon",
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
          ],
          urls: ["/css/fonts.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <?php $session = session(); ?>
    <!-- CSS Files -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/azzara.min.css" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/css/demo.css" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
      $(document).ready(function() {
          dataDetail();
          // inputCabang();
          inputOrangtua();
          $('#id_tanggal').val(new Date().toDateInputValue());
      });
    </script>
    <style>
      .select2-selection__rendered {
          line-height: 50px !important;
      }
      .select2-container .select2-selection--single {
          height: 50px !important;
      }
      .select2-selection__arrow {
          height: 50px !important;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
      <div class="main-header" style="background-color:#ffffff;filter: drop-shadow(0 4px 3px rgb(0 0 0 / 0.07)) drop-shadow(0 2px 2px rgb(0 0 0 / 0.06));">
        <!-- Logo Header -->
        <div class="logo-header">
          <a href="../index.html" class="logo">
          <img class="" src="/images/logo.png" alt="" style="width: 120px;;">
          </a>
          <button
            class="navbar-toggler sidenav-toggler ml-auto"
            type="button"
            data-toggle="collapse"
            data-target="collapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon">
              <i class="fa fa-bars"></i>
            </span>
          </button>
          <button class="topbar-toggler more">
            <i class="fa fa-ellipsis-v"></i>
          </button>
          <div class="navbar-minimize">
            <button class="btn btn-minimize btn-rounded">
              <i class="fa fa-bars"></i>
            </button>
          </div>
        </div>
        <!-- End Logo Header -->

      </div>
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="sidebar-wrapper scrollbar-inner">
          <div class="sidebar-content">
            <div class="user">
              <div class="info">
                <a
                  data-toggle="collapse"
                  href="#collapseExample"
                  aria-expanded="true"
                >
                  <span>
                  <?= $session->get('nama') ?>
                    <span class="user-level">Administrator</span>
                    <span class="caret"></span>
                  </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                  <ul class="nav">
                    <li>
                    <a
                      href="<?= url_to('admin.logout') ?>"
                    >
                      <span class="link-collapse">Logout</span>
                    </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <ul class="nav">
              <li class="nav-item">
                <a href="../index.html">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="badge badge-count">5</span>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <?php if($session->get('akses') == 1): ?>
              <li class="nav-item active submenu">
                <a data-toggle="collapse" href="#tables">
                  <i class="fas fa-table"></i>
                  <p>Master Data</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse show" id="tables">
                  <ul class="nav nav-collapse">
                    <li <?php if($page == "orangtua"){ echo "class='active'";};?>>
                      <a href="<?= url_to('admin.orangtua') ?>">
                        <span class="sub-item">Orang Tua</span>
                      </a>
                    </li>
                    <li <?php if($page == "jadwal"){ echo "class='active'";};?>>
                      <a href="<?= url_to('admin.jadwal') ?>">
                        <span class="sub-item">Jadwal</span>
                      </a>
                    </li>
                    <li <?php if($page == "produk"){ echo "class='active'";};?>>
                      <a href="<?= url_to('admin.produk') ?>">
                        <span class="sub-item">Produk</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item <?php if($page == "operator"){ echo "active";};?> submenu">
                <a href="<?= url_to('admin.operator') ?>">
                  <i class="fas fa-user"></i>
                  <p>Operator</p>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item <?php if($page == "reservasi"){ echo "active";};?> submenu">
                <a href="<?= url_to('admin.reservasi') ?>">
                  <i class="fas fa-book"></i>
                  <p>Reservasi</p>
                </a>
              </li>
              <?php if($session->get('akses') == 1): ?>
              <li class="nav-item <?php if($page == "diskon"){ echo "active";};?> submenu">
                <a href="<?= url_to('admin.diskon') ?>">
                  <i class="fas fa-percent"></i>
                  <p>Diskon</p>
                </a>
              </li>
              <li class="nav-item <?php if($page == "point"){ echo "active";};?> submenu">
                <a href="<?= url_to('admin.point') ?>">
                  <i class="fa fa-adjust"></i>
                  <p>Point Setting</p>
                </a>
              </li>
              <li class="nav-item <?php if($page == "hadiah"){ echo "active";};?> submenu">
                <a href="<?= url_to('admin.hadiah') ?>">
                  <i class="fa fa-gift"></i>
                  <p>Hadiah</p>
                </a>
              </li>
              <li class="nav-item <?php if($page == "histori"){ echo "active";};?> submenu">
                <a href="<?= url_to('admin.histori') ?>">
                  <i class="fa fa-recycle"></i>
                  <p>History Penukaran</p>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="main-panel">
        <div class="content">
          <div class="page-inner">
            <div class="row">

				<?= $this->renderSection('content') ?>
            </div>
          </div>
        </div>
      </div>

      
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('js/core/popper.min.js')?>"></script>
    <script src="<?php echo base_url('js/core/bootstrap.min.js')?>"></script>
    <!-- jQuery UI -->
    <script src="<?php echo base_url('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>"></script>
    <script src="<?php echo base_url('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')?>"></script>
    <!-- Bootstrap Toggle -->
    <script src="<?php echo base_url('js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')?>"></script>
    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('js/plugin/datatables/datatables.min.js')?>"></script>
    <!-- Azzara JS -->
    <script src="<?php echo base_url('js/ready.min.js')?>"></script>
    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url('js/setting-demo.js')?>"></script>
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-control"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
  </body>
</html>
