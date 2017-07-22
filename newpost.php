<?php
include("header.php");
?>


<div class="container my-1" ng-controller="Main as main">

  <form ng-show="main.isAuth()" ng-submit="main.submit()">
<?php echo '<textarea placeholder="'.$lang_yourdashhere.'" ng-model="comment"></textarea>'; ?>
        <button class="btn btn-primary" type="submit"><?php echo $lang_submit; ?></button>
  </form>

</div>
<?php
include("footer.php");
?>