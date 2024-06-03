<ul class="sidebar-nav" data-coreui="navigation" data-simplebar id="side-nav">
    <li class="nav-title">Junior</li>
    <li class="nav-item">
        <a class="nav-link" href="/vehicle-request"><i class="nav-icon fa-regular fa-address-book fa-lg"></i> Vehicle Request</a>
    </li>
    <li class="nav-divider"></li>

    <li class="nav-title">Denso Backend</li>

    <li class="nav-item">
        <a class="nav-link" href="/"><i class="nav-icon fa-regular fa-house"></i> หน้าแรก</a>
    </li>

    <?php if (userRole() === 'Admin') : ?>
        <li class="nav-divider"></li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#"><i class="nav-icon fa-regular fa-gear"></i>ตั้งค่า</a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="/company"><i class="me-2 fa-regular fa-building fa-lg"></i> Company</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/period"><i class="me-2 fa-regular fa-industry-windows fa-lg"></i> Location Period</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/slot"><i class="me-2 fa-regular fa-calendar-plus fa-lg"></i> Slot</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/report"><i class="nav-icon fa-regular fa-chart-bar"></i>Report</a>
        </li>
    <?php endif ?>

    <li class="nav-title">Denso</li>

    <li class="nav-item">
        <a class="nav-link" href="/employee"><i class="nav-icon fa-regular fa-address-book fa-lg"></i> Employee</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/denso"><i class="nav-icon fa-regular fa-tire"></i> Location</a>
    </li>

    <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#"><i class="nav-icon fa-regular fa-calendar-circle-plus"></i>Booking</a>
        <ul class="nav-group-items">

            <?php if (userRole() === 'Admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/booking/index"><i class="me-2 fa-regular fa-calendar-lines fa-lg"></i> All</a>
                </li>
            <?php endif ?>

            <?php if (userRole() === 'Admin' || (userRole() === 'Manager' && user()->username == 'denso_bpk')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/booking/bpk"><i class="me-2 fa-regular fa-calendar-lines fa-lg"></i> BPK Amata</a>
                </li>
            <?php endif ?>

            <?php if (userRole() === 'Admin' || (userRole() === 'Manager' && user()->username == 'denso_wgr')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/booking/wgr"><i class="me-2 fa-regular fa-calendar-lines fa-lg"></i> WGR Wellgrow</a>
                </li>
            <?php endif ?>

            <li class="nav-item">
                <a class="nav-link" href="/booking/qr"><i class="me-2 fa-regular fa-qrcode fa-lg"></i> QR Code</a>
            </li>

        </ul>
    </li>


    <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#"><i class="nav-icon fa-regular fa-syringe"></i>Vaccinated</a>
        <ul class="nav-group-items">
            <?php if (userRole() === 'Admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/report/vaccinated"><i class="me-2 fa-regular fa-industry fa-lg"></i> All</a>
                </li>
            <?php endif ?>

            <?php if (userRole() === 'Admin' || (userRole() === 'Manager' && user()->username == 'denso_bpk')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/report/vaccinated-bpk"><i class="me-2 fa-regular fa-industry-windows fa-lg"></i> BPK</a>
                </li>
            <?php endif ?>

            <?php if (userRole() === 'Admin' || (userRole() === 'Manager' && user()->username == 'denso_wgr')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/report/vaccinated-wgr"><i class="me-2 fa-regular fa-industry-windows fa-lg"></i> WGR</a>
                </li>
            <?php endif ?>


        </ul>
    </li>

    <?php if (userRole() === 'Admin' || (userRole() === 'Manager' && user()->username == 'denso_bpk')) : ?>
        <li class="nav-item">
            <a class="nav-link" href="/report/bpk"><i class="nav-icon fa-regular fa-chart-bar"></i>Report BPK AMATA</a>
        </li>
    <?php endif ?>

    <?php if (userRole() === 'Admin' || (userRole() === 'Manager' && user()->username == 'denso_wgr')) : ?>
        <li class="nav-item">
            <a class="nav-link" href="/report/wgr"><i class="nav-icon fa-regular fa-chart-bar"></i>Report WGR Wellgrow</a>
        </li>
    <?php endif ?>

    <li class="nav-divider"></li>

    <li class="nav-item mt-auto"><a class="nav-link" href="/site/logout" target="_top">
            <i class="nav-icon fa-regular fa-right-from-bracket"></i> ออกจากระบบ</a>
    </li>
</ul>