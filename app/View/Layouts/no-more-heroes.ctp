<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'PDNS Editor' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<style>
	 body {
	  padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	 }

	</style>
</head>
<body>

	<div class="navbar navbar-fixed-top">
	 <div class="navbar-inner">
	  <div class="container-fluid">
	   <a class="brand" href="#"><?php echo $cakeDescription . ': ' . $title_for_layout; ?></a>
	  </div>
	 </div>
	</div>


	<div class="container">
	 <?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>
