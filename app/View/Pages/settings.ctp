<?php
$arpaFilter = Configure::read('filter_arpa');

$dataSource = ConnectionManager::getDataSource('default');
$dbHostname = $dataSource->config['host'];
$dbDatabase = $dataSource->config['database'];
$dbUsername = $dataSource->config['login'];

?>
<form class="form-horizontal" id='settingsForm' action=''>
<div class="row">
 <div class="span4">
  <h1>General</h1>
 </div>
</div>
<div class="row">
 <div class="span4 offset3">
  <div class="control-group">
   <label class="control-label" for="filterArpa">
    Filter .in-addr.arpa zones?
   </label>
   <div class="controls">
    <input id="filterArpa" type="checkbox" <?php if( $arpaFilter == 1) { echo "checked='true'"; } ?>>
   </div>
  </div>
 </div>
</div>
<div class="row">
 <div class="span4 offset3">
  <input type="button" class="btn btn-primary" value="Save Settings" />
 </div>
</div>
</form>
