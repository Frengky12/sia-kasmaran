<!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">Home</li>
            <li class="nav-item">
              <a href="index.php" class="nav-link <?php if ($title == 'Dashboard'){echo 'active';} ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <!-- Batas Menu Sistem Informasi -->
            <li class="nav-header">Sistem Informasi</li>

            <li class="nav-item">
              <a href="visi-misi.php" class="nav-link <?php if ($title == 'Visi Misi'){echo 'active';} ?>">
                <i class="nav-icon fa fa-circle fa-1"></i>
                <p>
                  Visi & Misi
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="informasi.php" class="nav-link <?php if ($title == 'Informasi'){echo 'active';} ?>">
                <i class="nav-icon fa fa-circle fa-1"></i>
                <p>
                  Informasi
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link <?php if ($title == 'Fasilitas'){echo 'active';} ?>">
                <i class="nav-icon fa fa-circle fa-1"></i>
                <p>
                  Fasilitas
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="sejarah.php" class="nav-link <?php if ($title == 'Sejarah'){echo 'active';} ?>">
                <i class="nav-icon fa fa-circle fa-1"></i>
                <p>
                  Sejarah
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="kontak.php" class="nav-link <?php if ($title == 'Kontak'){echo 'active';} ?>">
                <i class="nav-icon fa fa-circle fa-1"></i>
                <p>
                  Kontak
                </p>
              </a>
            </li>

            <!-- Batas Menu Sistem Layanan Administrasi -->
            <li class="nav-header">Layanan Administrasi</li>
            <li class="nav-item">
              <a href="sk-tidak-mampu.php" class="nav-link <?php if ($title == 'SK Tidak Mampu'){echo 'active';} ?>">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  SK Tidak Mampu
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="sk-domisili.php" class="nav-link <?php if ($title == 'SK Domisili'){echo 'active';} ?>">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  SK Domisili
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="sk-usaha.php" class="nav-link <?php if ($title == 'SK Usaha'){echo 'active';} ?>">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  SK Usaha
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="sk-kematian.php" class="nav-link <?php if ($title == 'SK Kematian'){echo 'active';} ?>">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  SK Kematian
                </p>
              </a>
            </li>

            
            <li class="nav-item">
              <a href="surat-pengantar-nikah.php" class="nav-link <?php if ($title == 'Surat Pengantar Nikah'){echo 'active';} ?>">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  Surat Pengantar Nikah
                </p>
              </a>
            </li>

            <li class="nav-header"><i>Config</i></li>

            <li class="nav-item">
              <a href="akun.php" class="nav-link <?php if ($title == 'Akun'){echo 'active';} ?>">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Akun
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="logout.php" class="nav-link" onclick="return confirm('Yakin Ingin Keluar Dari Sistem');">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li> 
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->