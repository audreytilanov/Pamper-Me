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

    <!-- CSS Files -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/azzara.min.css" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
      <div class="main-header" data-background-color="purple">
        <!-- Logo Header -->
        <div class="logo-header">
          <a href="../index.html" class="logo">
            <img
              src="/img/logoazzara.svg"
              alt="navbar brand"
              class="navbar-brand"
            />
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

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg">
          <div class="container-fluid">
            <div class="collapse" id="search-nav">
              <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pr-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </form>
            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
              <li class="nav-item toggle-nav-search hidden-caret">
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#search-nav"
                  role="button"
                  aria-expanded="false"
                  aria-controls="search-nav"
                >
                  <i class="fa fa-search"></i>
                </a>
              </li>
              <li class="nav-item dropdown hidden-caret">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="messageDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fa fa-envelope"></i>
                </a>
                <ul
                  class="dropdown-menu messages-notif-box animated fadeIn"
                  aria-labelledby="messageDropdown"
                >
                  <li>
                    <div
                      class="dropdown-title d-flex justify-content-between align-items-center"
                    >
                      Messages
                      <a href="#" class="small">Mark all as read</a>
                    </div>
                  </li>
                  <li>
                    <div class="message-notif-scroll scrollbar-outer">
                      <div class="notif-center">
                        <a href="#">
                          <div class="notif-img">
                            <img
                              src="/img/jm_denis.jpg"
                              alt="Img Profile"
                            />
                          </div>
                          <div class="notif-content">
                            <span class="subject">Jimmy Denis</span>
                            <span class="block"> How are you ? </span>
                            <span class="time">5 minutes ago</span>
                          </div>
                        </a>
                        <a href="#">
                          <div class="notif-img">
                            <img
                              src="/img/chadengle.jpg"
                              alt="Img Profile"
                            />
                          </div>
                          <div class="notif-content">
                            <span class="subject">Chad</span>
                            <span class="block"> Ok, Thanks ! </span>
                            <span class="time">12 minutes ago</span>
                          </div>
                        </a>
                        <a href="#">
                          <div class="notif-img">
                            <img
                              src="/img/mlane.jpg"
                              alt="Img Profile"
                            />
                          </div>
                          <div class="notif-content">
                            <span class="subject">Jhon Doe</span>
                            <span class="block">
                              Ready for the meeting today...
                            </span>
                            <span class="time">12 minutes ago</span>
                          </div>
                        </a>
                        <a href="#">
                          <div class="notif-img">
                            <img
                              src="/img/talha.jpg"
                              alt="Img Profile"
                            />
                          </div>
                          <div class="notif-content">
                            <span class="subject">Talha</span>
                            <span class="block"> Hi, Apa Kabar ? </span>
                            <span class="time">17 minutes ago</span>
                          </div>
                        </a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <a class="see-all" href="javascript:void(0);"
                      >See all messages<i class="fa fa-angle-right"></i>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown hidden-caret">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="notifDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fa fa-bell"></i>
                  <span class="notification">4</span>
                </a>
                <ul
                  class="dropdown-menu notif-box animated fadeIn"
                  aria-labelledby="notifDropdown"
                >
                  <li>
                    <div class="dropdown-title">
                      You have 4 new notification
                    </div>
                  </li>
                  <li>
                    <div class="notif-center">
                      <a href="#">
                        <div class="notif-icon notif-primary">
                          <i class="fa fa-user-plus"></i>
                        </div>
                        <div class="notif-content">
                          <span class="block"> New user registered </span>
                          <span class="time">5 minutes ago</span>
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-icon notif-success">
                          <i class="fa fa-comment"></i>
                        </div>
                        <div class="notif-content">
                          <span class="block"> Rahmad commented on Admin </span>
                          <span class="time">12 minutes ago</span>
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-img">
                          <img
                            src="/img/profile2.jpg"
                            alt="Img Profile"
                          />
                        </div>
                        <div class="notif-content">
                          <span class="block"> Reza send messages to you </span>
                          <span class="time">12 minutes ago</span>
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-icon notif-danger">
                          <i class="fa fa-heart"></i>
                        </div>
                        <div class="notif-content">
                          <span class="block"> Farrah liked Admin </span>
                          <span class="time">17 minutes ago</span>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li>
                    <a class="see-all" href="javascript:void(0);"
                      >See all notifications<i class="fa fa-angle-right"></i>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown hidden-caret">
                <a
                  class="dropdown-toggle profile-pic"
                  data-toggle="dropdown"
                  href="#"
                  aria-expanded="false"
                >
                  <div class="avatar-sm">
                    <img
                      src="/img/profile.jpg"
                      alt="..."
                      class="avatar-img rounded-circle"
                    />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <li>
                    <div class="user-box">
                      <div class="avatar-lg">
                        <img
                          src="/img/profile.jpg"
                          alt="image profile"
                          class="avatar-img rounded"
                        />
                      </div>
                      <div class="u-text">
                        <h4>Hizrian</h4>
                        <p class="text-muted">hello@example.com</p>
                        <a
                          href="profile.html"
                          class="btn btn-rounded btn-danger btn-sm"
                          >View Profile</a
                        >
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">My Profile</a>
                    <a class="dropdown-item" href="#">My Balance</a>
                    <a class="dropdown-item" href="#">Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Account Setting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="sidebar-wrapper scrollbar-inner">
          <div class="sidebar-content">
            <div class="user">
              <div class="avatar-sm float-left mr-2">
                <img
                  src="/img/profile.jpg"
                  alt="..."
                  class="avatar-img rounded-circle"
                />
              </div>
              <div class="info">
                <a
                  data-toggle="collapse"
                  href="#collapseExample"
                  aria-expanded="true"
                >
                  <span>
                    Hizrian
                    <span class="user-level">Administrator</span>
                    <span class="caret"></span>
                  </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                  <ul class="nav">
                    <li>
                      <a href="#profile">
                        <span class="link-collapse">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a href="#edit">
                        <span class="link-collapse">Edit Profile</span>
                      </a>
                    </li>
                    <li>
                      <a href="#settings">
                        <span class="link-collapse">Settings</span>
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

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Topbar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeMainHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="selected changeMainHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeMainHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeMainHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeMainHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeMainHeaderColor"
                  data-color="red"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Background</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeBackgroundColor"
                  data-color="bg2"
                ></button>
                <button
                  type="button"
                  class="changeBackgroundColor selected"
                  data-color="bg1"
                ></button>
                <button
                  type="button"
                  class="changeBackgroundColor"
                  data-color="bg3"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="flaticon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('js/core/jquery.3.2.1.min.js')?>"></script>
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
