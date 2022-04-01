<?php
function tab_active($url)
{
     echo Request::segment(3)==$url?'class="active"':'';
}
?>

<!-- Custom Tabs -->
<div class="nav nav-tabs">
        <li class="nav-item" {{ tab_active('edit') }}>
                <a class="nav-link {{ tab_active('edit') ? 'active' : '' }}"
                        href="/guru/{{ Request::segment(2) }}/edit"><i class="fa fa-user" aria-hidden="true"></i> Data
                        Guru</a>
        </li>
        <li class="nav-item" {{ tab_active('polakerja') }}>
                <a class="nav-link {{ tab_active('polakerja') ? 'active' : '' }}"
                        href="/guru/{{ Request::segment(2) }}/polakerja">
                        <i class="fa fa-calendar" aria-hidden="true"></i> Pola Kerja</a>
        </li>
        <li class="nav-item" {{ tab_active('kehadiran') }}>
                <a class="nav-link {{ tab_active('kehadiran') ? 'active' : '' }}"
                        href="/guru/{{ Request::segment(2) }}/kehadiran">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Riwayat Kehadiran</a>
        </li>
        <li class="nav-item" {{ tab_active('lembur') }}>
                <a class="nav-link" href="/guru/{{ Request::segment(2) }}/lembur">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Riwayat Lembur</a>
        </li>
        <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->