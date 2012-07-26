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
		echo $this->Html->meta('icon')."\n";
		echo $this->Html->css('bootstrap.min')."\n";
		echo $this->Html->css('jquery.autocomplete.css');
		echo $this->fetch('meta')."\n";
		echo $this->fetch('css')."\n";
		echo $this->Html->script('jquery') . "\n";
		echo $this->Html->script('bootstrap.min') . "\n";
		echo $this->Html->script('jquery.autocomplete.min')."\n";
		echo $this->Html->script('home.scripts'). "\n";
		echo $this->fetch('script')."\n";
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
          <div class="container">
           <a class="brand" href="/"><?php echo $cakeDescription . ': ' . $title_for_layout; ?></a>
	   <ul class="nav pull-right">
	    <li><a href="/pages/settings" title="Settings"><i class="icon-cog icon-white"></i></a></li>
	    <li><form class="navbar-search">
		 <input id='domainSearch' class="search-query span2" type="text" placeholder="Search for a domain...">
		 <a id='domainSearchGo' class='btn btn-primary btn-small' href='#'><i class="icon-search icon-white"></i></a>
	    </form></li>
	   </ul>
          </div>
         </div>
        </div>
	<div class="container">
	 <?php echo $this->fetch('content'); ?>
	</div>
</body>
<script type='text/javascript'>
$("#domainSearchGo").click( function(e) {
	e.preventDefault();
	var theDomain = $("#domainSearch").val();
	window.location.href = '/Domains/searchDomains/query:' + theDomain;
});
</script>
</html>
