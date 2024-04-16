<?php
$dirAsset = Yii::$app->assetManager->getPublishedUrl('@coreui/dist');

?>
<div class="nav-item dropdown">
  <button class="btn btn-link nav-link" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
    <svg class="icon icon-lg">
      <use xlink:href="<?php echo $dirAsset ?>/vendors/@coreui/icons/svg/free.svg#cil-language"></use>
    </svg>
  </button>
  <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
    <li>
      <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-language-value="th" onclick="i18next.changeLanguage('th')">
        <svg class="icon icon-lg me-3">
          <use xlink:href="<?php echo $dirAsset ?>/vendors/@coreui/icons/svg/flag.svg#cif-th"></use>
        </svg>Thai
      </button>
    </li>
    <li>
      <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-language-value="en" onclick="i18next.changeLanguage('en')">
        <svg class="icon icon-lg me-3">
          <use xlink:href="<?php echo $dirAsset ?>/vendors/@coreui/icons/svg/flag.svg#cif-gb"></use>
        </svg>English
      </button>
    </li>
    <li>
      <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-language-value="jp" onclick="i18next.changeLanguage('jp')">
        <svg class="icon icon-lg me-3">
          <use xlink:href="<?php echo $dirAsset ?>/vendors/@coreui/icons/svg/flag.svg#cif-jp"></use>
        </svg>Japanese
      </button>
    </li>
  </ul>
</div>