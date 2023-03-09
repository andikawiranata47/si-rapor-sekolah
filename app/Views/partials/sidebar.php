<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>


<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas overflow-auto vh-100" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-category"> </li>
            <li class="nav-item">
                <a class="nav-link" href="/welcome">
                    <span class="icon-bg"><i class="mdi mdi-account menu-icon"></i></span>
                    <span class="menu-title">Welcome</span>
                </a>
            </li>
            <li class="nav-item nav-category">Admin</li>
            <li class="nav-item">
                <a class="nav-link" href="/masteruser">
                    <span class="icon-bg"><i class="mdi mdi-account menu-icon"></i></span>
                    <span class="menu-title">Master User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/kelas">
                    <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                    <span class="menu-title">Kelas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/matapelajaran">
                    <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                    <span class="menu-title">Mata Pelajaran</span>
                </a>
            </li>

            <?php if (strpos($CurPageURL, '/matapelajarankelas/get')) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/matapelajarankelas">
                        <span class="icon-bg"><i class="mdi mdi-chart-areaspline menu-icon"></i></span>
                        <span class="menu-title">Mata Pelajaran Kelas</span>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/matapelajarankelas">
                        <span class="icon-bg"><i class="mdi mdi-chart-areaspline menu-icon"></i></span>
                        <span class="menu-title">Mata Pelajaran Kelas</span>
                    </a>
                </li>
            <?php } ?>

            <li class="nav-item">
                <a class="nav-link" href="/siswa">
                    <span class="icon-bg"><i class="mdi mdi-account-plus menu-icon"></i></span>
                    <span class="menu-title">Siswa</span>
                </a>
            </li>

            <?php if (strpos($CurPageURL, '/siswakelas/get')) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/siswakelas">
                        <span class="icon-bg"><i class="mdi mdi-account-multiple-plus menu-icon"></i></span>
                        <span class="menu-title">Siswa Kelas</span>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/siswakelas">
                        <span class="icon-bg"><i class="mdi mdi-account-multiple-plus menu-icon"></i></span>
                        <span class="menu-title">Siswa Kelas</span>
                    </a>
                </li>
            <?php } ?>

            <li class="nav-item nav-category">Guru Mata Pelajaran</li>
            <?php if (strpos($CurPageURL, '/nilaimatapelajaran/get')) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/nilaimatapelajaran">
                        <span class="icon-bg"><i class="mdi mdi-table menu-icon"></i></span>
                        <span class="menu-title">Nilai Mata Pelajaran</span>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/nilaimatapelajaran">
                        <span class="icon-bg"><i class="mdi mdi-table menu-icon"></i></span>
                        <span class="menu-title">Nilai Mata Pelajaran</span>
                    </a>
                </li>
            <?php } ?>


            <li class="nav-item nav-category">Guru Monitoring</li>
            <?php if (strpos($CurPageURL, '/nilaiprakerin/get')) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/nilaiprakerin">
                        <span class="icon-bg"><i class="mdi mdi-table menu-icon"></i></span>
                        <span class="menu-title">Nilai Prakerin</span>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/nilaiprakerin">
                        <span class="icon-bg"><i class="mdi mdi-table menu-icon"></i></span>
                        <span class="menu-title">Nilai Prakerin</span>
                    </a>
                </li>
            <?php } ?>


            <li class="nav-item nav-category">Guru Ekstrakurikuler</li>
            <li class="nav-item">
                <a class="nav-link" href="/nilaiekstrakurikuler">
                    <span class="icon-bg"><i class="mdi mdi-table menu-icon"></i></span>
                    <span class="menu-title">Nilai Ekstrakurikuler</span>
                </a>
            </li>

            <li class="nav-item nav-category">Guru BK</li>
            <?php if (strpos($CurPageURL, '/kepribadian/get')) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/kepribadian">
                        <span class="icon-bg"><i class="mdi mdi-table menu-icon"></i></span>
                        <span class="menu-title">Kepribadian & Kehadiran</span>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/kepribadian">
                        <span class="icon-bg"><i class="mdi mdi-table menu-icon"></i></span>
                        <span class="menu-title">Kepribadian & Kehadiran</span>
                    </a>
                </li>
            <?php } ?>

            <li class="nav-item nav-category">Wali Kelas</li>
            <li class="nav-item">
                <a class="nav-link" href="/rapor">
                    <span class="icon-bg"><i class="mdi mdi-table menu-icon"></i></span>
                    <span class="menu-title">Rapor</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- partial -->