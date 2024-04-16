<footer class="footer px-4 <?php echo  in_array(Yii::$app->controller->id, ['auth']) || in_array(Yii::$app->controller->action->id, ['index', 'slot', 'step3']) ? 'fixed-bottom' : '' ?> ">
  <div><span>&copy; <?php echo date('Y') ?> NextSchool.</span></div>
  <div>
    <span class=" creator-credit">Made with <i class="fa fa-heart"></i> by <a href="https://www.nextschool.io/" class="creator-credit"><img src="<?php echo $dirAsset . "/assets/brand/nextschool-landscape-small.png" ?>" /></a></span>
  </div>
</footer>