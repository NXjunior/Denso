<?php

use coreui\assets\AppAsset;
use coreui\assets\CoreUIAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\web\View;

?>
<header class="header header-sticky p-0 mb-4">
  <div class="container-fluid px-4 border-bottom">
    <button class="header-toggler d-lg-none" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
      <svg class="icon icon-lg">
        <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-menu" ?>"></use>
      </svg>
    </button>

    <h4 class="d-none d-sm-flex pt-2"><?php echo $this->params['siteName'] ?> : ระบบรับสมัคร</h4>

    <ul class="header-nav ms-auto ms-md-0">
      <li class="nav-item py-1">
        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
      </li>
      <li class="nav-item dropdown">
        <button class="btn btn-link nav-link" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
          <svg class="icon icon-lg theme-icon-active">
            <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-contrast" ?>"></use>
          </svg>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
          <li>
            <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
              <svg class="icon icon-lg me-3">
                <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-sun" ?>"></use>
              </svg><span data-coreui-i18n="light">Light</span>
            </button>
          </li>
          <li>
            <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
              <svg class="icon icon-lg me-3">
                <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-moon" ?>"></use>
              </svg><span data-coreui-i18n="dark"> Dark</span>
            </button>
          </li>
          <li>
            <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
              <svg class="icon icon-lg me-3">
                <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-contrast" ?>"></use>
              </svg>Auto
            </button>
          </li>
        </ul>
      </li>
      <li class="nav-item py-1">
        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md bg-white border border-secondary">
            <div class="profile-mask">
              <img class=" profile-image" src="<?php echo $this->params['profileImage'] ?>" alt="user@email.com">
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end pt-0">
          <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2" data-coreui-i18n="account">Account</div><a class="dropdown-item" href="#">
            <svg class="icon me-2">
              <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-bell" ?>"></use>
            </svg><span data-coreui-i18n="updates">แจ้งเตือน</span><span class="badge badge-sm bg-info-gradient ms-2">0</span></a><a class="dropdown-item" href="/site/logout">
            <svg class="icon me-2">
              <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-account-logout" ?>"></use>
            </svg><span data-coreui-i18n="logout">ออกจากระบบ</span></a>
        </div>
      </li>
    </ul>
  </div>
  <?php if (isset($this->params['breadcrumbs'])) : ?>
    <div class="container-fluid px-4">
      <nav aria-label="breadcrumb">
        <?php echo  Breadcrumbs::widget([
          'tag' => 'ol',
          'options' => [
            'class' => 'breadcrumb my-0'
          ],
          'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
          'activeItemTemplate' => "<li class='breadcrumb-item active'>{link}</li>\n",
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
      </nav>
    </div>
  <?php endif ?>
</header>