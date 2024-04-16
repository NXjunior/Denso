<div class="sidebar sidebar-fixed sidebar-dark bg-dark-gradient border-end" id="sidebar">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand">

      <div class="sidebar-brand-full h2">
        <div class="avatar avatar-lg border border-secondary">
          <div class="profile-mask bg-white">
            <img class="brand-image" src="<?php echo Yii::$app->params['logoImage'] ?>" alt="School Logo">
          </div>
        </div>
        <a href="/" class="text-decoration-none link-light"><?php echo Yii::$app->params['siteABS'] ?></a>
      </div>

      <div class="sidebar-brand-narrow">
        <div class="avatar avatar-md border border-secondary">
          <div class="profile-mask bg-white">
            <img class="brand-image" src="<?php echo Yii::$app->params['logoImage'] ?>" alt="School Logo">
          </div>
        </div>
      </div>
    </div>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
  </div>
  <?php echo $this->render('_sidebar_menu.php', ['dirAsset' => $dirAsset]);
  ?>
</div>
<div class="sidebar sidebar-light sidebar-lg sidebar-end sidebar-overlaid border-start" id="aside">
  <div class="sidebar-header p-0 position-relative">
    <ul class="nav nav-underline-border w-100" role="tablist">
      <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab" href="#timeline" role="tab">
          <svg class="icon">
            <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-list" ?>"></use>
          </svg></a></li>
      <li class="nav-item"><a class="nav-link" data-coreui-toggle="tab" href="#messages" role="tab">
          <svg class="icon">
            <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-speech" ?>"></use>
          </svg></a></li>
      <li class="nav-item"><a class="nav-link" data-coreui-toggle="tab" href="#settings" role="tab">
          <svg class="icon">
            <use xlink:href="<?php echo $dirAsset . "/vendors/@coreui/icons/svg/free.svg#cil-settings" ?>"></use>
          </svg></a></li>
    </ul>
    <button class="btn-close position-absolute top-50 end-0 translate-middle my-0" type="button" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#aside&quot;)).toggle()"></button>
  </div>
</div>