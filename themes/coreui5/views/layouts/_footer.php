<footer class="footer px-4 text-sm-center <?php echo  in_array(Yii::$app->controller->id, ['auth']) || (Yii::$app->controller->id == 'register' && in_array(Yii::$app->controller->action->id, ['index', 'slot', 'qr', 'change'])) ? 'fixed-bottom' : '' ?> ">
  <div class="text-body-tertiary text-truncate ">
    <span>&copy; <?php echo date('Y') ?> Nextgensoft</span>
    | <?php echo ('Executed in ' . round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 2) . 's') ?>
  </div>
  <div>
    <span class="creator-credit text-body-tertiary text-truncate ">Made with <i class="fa fa-heart"></i> by <a href="https://nextschool.io" class="creator-credit"><img src="<?php echo $dirAsset . "/assets/brand/nextschool-landscape-small.png" ?>" /></a></span>
  </div>
</footer>