<?php
$theDomain = $domain['Domain'];
$theRecords = $records;
$theSOA = $soa;
$soaFields = preg_split( '/ /', $theSOA['Record']['content'], -1 );
?>
<div class="row">
 <div class='span6'>
  <h2><?php echo $theDomain['name']; ?></h2>
 </div>
 <div class='span2 offset4'>
  <!-- <a href='/Domains/DeleteDomain/<?php echo $theDomain['id']; ?>' class='btn btn-danger' title='Delete this domain' id='btnDel'><i class='icon-trash icon-white'></i>Delete</a> -->
  <a href='#delConfirm' class='btn btn-danger' title='Delete this domain' data-toggle='modal'><i class='icon-trash icon-white'></i>Delete</a>
 </div>
</div>
<div class="row">
 <div class="span8 well">
  <form class="form-horizontal" id="soaForm" action="/Record/editSOA" method="GET">
   <div class="control-group">
    <label class="control-label" for="mname">Primary Name Server</label>
    <div class="controls">
     <input type="text" class="input-xlarge" id="mname">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="rname">Hostmaster Email Address</label>
    <div class="controls">
     <input type="text" class="input-xlarge" id="rname">
     <p class="help-block">Note that the '@' should be replaced with a '.'</p>
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="snum">Serial Number</label>
    <div class="controls">
     <input type="text" class="input-xlarge" id="snum">
     <p class="help-block">The serial number is updated automatically when you modify, add or delete a record</p>
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="refresh">Refresh</label>
    <div class="controls">
     <input type="text" class="input-xlarge" id="refresh">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="retry">Retry</label>
    <div class="controls">
     <input type="text" class="input-xlarge" id="retry">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="expire">Expire</label>
    <div class="controls">
     <input type="text" class="input-xlarge" id="expire">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="minttl">Minimum TTL</label>
    <div class="controls">
     <input type="text" class="input-xlarge" id="minttl">
    </div>
   </div>
  </form>
 </div>
</div>
<div class="row">
 <table class='table table-striped'>
  <thead>
   <tr><th colspan='5'>
    <?php echo $this->Paginator->prev(); ?>
    <?php echo $this->Paginator->numbers( array( 'first' => 2, 'last' => 2, 'modulus' => 3 )); ?>
    <?php echo $this->Paginator->next(); ?>
   </th></tr>
   <th><h4>Name</h4></th><th><h4>Type</h4></th><th><h4>Content</h4></th><th><h4>TTL</h4></th><th>&nbsp;</th></tr>
  </thead>
  <tfoot>
   <tr><th colspan='5'>
    <?php echo $this->Paginator->prev(); ?>
    <?php echo $this->Paginator->numbers( array( 'first' => 2, 'last' => 2, 'modulus' => 3 )); ?>
    <?php echo $this->Paginator->next(); ?>
   </th></tr>
  </tfoot>
  <tbody>
   <tr>
    <form id='frmAddRecord' action='/Record/Add' method='POST' class='form'>
     <td><input type='text' name='name' placeholder='example.<?php echo $theDomain['name']; ?>' /></td>
     <td><select name='type' class='span2'>
      <option>A</option>
      <option>MX</option>
      <option>NS</option>
      <option>AAAA</option>
      <option>SRV</option>
      <option>TXT</option>
      <option>CNAME</option>
      <option>SPF</option>
      <option>PTR</option>
     </select></td>
     <td><input type='text' name='content' placeholder='www.<?php echo $theDomain['name']; ?>' /></td>
     <td><input type='text' name='ttl' class='span2' value='86400' /></td>
     <td><a href='#' id='btnAdd'><i class='icon-plus'></i></a></td>
    </form>
   </tr>
<?php foreach( $theRecords as $aRecord ): ?>
   <tr>
    <td><?php echo $aRecord['Record']['name']; ?></td>
    <td><?php echo $aRecord['Record']['type']; ?></td>
    <td><?php echo $aRecord['Record']['content']; ?></td>
    <td><?php echo $aRecord['Record']['ttl']; ?></td>
    <td>
     <a href='#' title='Edit this record' class='recEdit' 
	rec-id='<?php echo $aRecord['Record']['id']; ?>'
	rec-name='<?php echo $aRecord['Record']['name']; ?>'
	rec-content='<?php echo $aRecord['Record']['content']; ?>'
     ><i class='icon-edit'></i></a>
<?php if ( $aRecord['Record']['type'] != 'SOA' ) : ?>
     <a href='#' title='Delete this record' class='recDelete' rec-id='<?php echo $aRecord['Record']['id']; ?>' rec-type='<?php echo $aRecord['Record']['type']; ?>'><i class='icon-trash'></i></a>
<?php endif; ?>
   </td>
   </tr>
<?php endforeach; ?>
  </tbody>
 </table>
</div>
<?php 
echo $this->element('confirm', array(
	'confirmId' => 'delConfirm',
	'confirmHdr' => 'Really delete?',
	'confirmText' => 'Are you sure you want to delete this domain and its records?',
	'confirmAction' => '/Domains/DeleteDomain/' . $theDomain['id']
));
echo $this->element('confirm', array(
	'confirmId' => 'delRecord',
	'confirmHdr' => 'Really delete this record?',
	'confirmText' => 'Placeholder',
	'confirmAction' => '#' . $theDomain['id']
));
echo $this->element('editRecord');
?>
<script>
$(".recDelete").click( function() {
	var recType = $(this).attr('rec-type');
	var recId = $(this).attr('rec-id');
	$("#delRecord_confirmBody").html('Are you sure you want to delete this ' + recType + ' record?');
	$("#delRecord_btnConfirm").attr('href', '/Records/DeleteRecord/' + recId );
	$("#delRecord").modal('show');
});
$(".recEdit").click( function() {
	var recId = $(this).attr('rec-id');
	var recName = $(this).attr('rec-name');
	var recContent = $(this).attr('rec-content');
	$("#recName").attr('value', recName);
	$("#recContent").attr('value', recContent);
	$("#editRecord").modal('show');
	$("#RecordEditForm").attr( 'action', '/Records/updateRecord/' + recId );
});
</script>
