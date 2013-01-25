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
<div class="row-fluid">
 <div class="span3 well">
  <form class="form" id="soaForm" action="/Record/editSOA" method="GET">
   <div class="control-group">
    <label class="control-label" for="mname">Primary Name Server</label>
    <div class="controls">
     <input type="text" class="input-medium" id="mname" value="<?php echo $soaFields[0] ?>">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="rname">Hostmaster Email Address</label>
    <div class="controls">
     <div class="input-append"><input type="text" class="input-medium" id="rname" value="<?php echo $soaFields[1] ?>">
     <span class="add-on"><a class='helptool' href="#" rel="tooltip" title="The email address for the hostmaster. Replace the '@' with a period ('.')"><i class="icon-question-sign"></i></a></span></div>
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="snum">Serial Number</label>
    <div class="controls">
     <div class="input-append"><input type="text" class="input-medium" id="snum" value="<?php echo $soaFields[2] ?>">
     <span class="add-on"><a class="helptool" href="#" rel="tooltip" title="The serial number is updated automatically when you modify, add or delete a record"><i class="icon-question-sign"></i></a></span></div>
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="refresh">Refresh</label>
    <div class="controls">
     <input type="text" class="input-medium" id="refresh" value="<?php echo $soaFields[3] ?>">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="retry">Retry</label>
    <div class="controls">
     <input type="text" class="input-medium" id="retry" value="<?php echo $soaFields[4] ?>">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="expire">Expire</label>
    <div class="controls">
     <input type="text" class="input-medium" id="expire" value="<?php echo $soaFields[5] ?>">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="minttl">Minimum TTL</label>
    <div class="controls">
     <input type="text" class="input-medium" id="minttl" value="<?php echo $soaFields[6] ?>">
    </div>
   </div>
   <div class="control-group">
    <div class="controls">
     <input id='soaUpdate' type="button" class="btn btn-primary" value="Go!">
    </div>
   </div>
  </form>
 </div>
 <div class="span9">
 <table class='table table-striped'>
  <thead>
   <tr><th colspan='6'>
    <?php echo $this->Paginator->prev(); ?>
    <?php echo $this->Paginator->numbers( array( 'first' => 2, 'last' => 2, 'modulus' => 3 )); ?>
    <?php echo $this->Paginator->next(); ?>
   </th></tr>
   <th><h4>Name</h4></th><th><h4>Type</h4></th><th><h4>Content</h4></th><th><h4>TTL</h4></th><th>Prio</th><th>&nbsp;</th></tr>
  </thead>
  <tfoot>
   <tr><th colspan='6'>
    <?php echo $this->Paginator->prev(); ?>
    <?php echo $this->Paginator->numbers( array( 'first' => 2, 'last' => 2, 'modulus' => 3 )); ?>
    <?php echo $this->Paginator->next(); ?>
   </th></tr>
  </tfoot>
  <tbody>
   <tr>
    <form id='frmAddRecord' action='/Record/Add' method='POST' class='form'>
     <td><input id='frmAddName' type='text' name='name' class='input-large' placeholder='example.<?php echo $theDomain['name']; ?>' /></td>
     <td><select id='frmAddType' name='type' class='span2' style='width: 70px;'> 
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
     <td><input id='frmAddContent' type='text' class='input-medium' name='content' placeholder='www.<?php echo $theDomain['name']; ?>' /></td>
     <td><input id='frmAddTTL' type='number' class='input-small' name='ttl' class='span2' value='86400' style='width: 50px;' /></td>
     <td><input id='frmAddPrio' type='number' class='input-mini' name='prio' class='span2' value='0'/></td>
     <td><a href='#' id='btnAdd'><i class='icon-plus'></i></a></td>
    </form>
   </tr>
<?php foreach( $theRecords as $aRecord ): ?>
   <tr>
    <td><?php echo $aRecord['Record']['name']; ?></td>
    <td><?php echo $aRecord['Record']['type']; ?></td>
    <td><?php echo $aRecord['Record']['content']; ?></td>
    <td><?php echo $aRecord['Record']['ttl']; ?></td>
    <td><?php echo $aRecord['Record']['prio']; ?></td>
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
echo $this->element('ok', array(
	'okayId' => 'addOkay',
	'okayHdr' => 'Record Added/Updated!',
	'okayText' => 'Your new record has been added.',
));
?>
<script>
// add the tooltip stuffs
//
$('.helptool').tooltip({
	placement: 'right'
});

// Show the record deletion dialog
//
$(".recDelete").click( function() {
	var recType = $(this).attr('rec-type');
	var recId = $(this).attr('rec-id');
	$("#delRecord_confirmBody").html('Are you sure you want to delete this ' + recType + ' record?');
	$("#delRecord_btnConfirm").attr('href', '/Records/DeleteRecord/' + recId );
	$("#delRecord").modal('show');
});

// Show the record editig dialog
//
$(".recEdit").click( function() {
	var recId = $(this).attr('rec-id');
	var recName = $(this).attr('rec-name');
	var recContent = $(this).attr('rec-content');
	$("#recName").attr('value', recName);
	$("#recContent").attr('value', recContent);
	$("#editRecord").modal('show');
	$("#RecordEditForm").attr( 'action', '/Records/updateRecord/' + recId );
});

// Add a new record!
//
$("#btnAdd").click( function() {
	var recName = $("#frmAddName").val();
	var recType = $("#frmAddType").val();
	var recContent = $("#frmAddContent").val();
	var recTTL = $("#frmAddTTL").val();
	var recPrio = $("#frmAddPrio").val();
	var theDomain = '<?php echo $theDomain['name']; ?>';
	$.post('/Records/add', { 
		 domain: theDomain, 
		 name: recName,
		 type: recType,
		 content: recContent,
		 ttl: recTTL,
		 prio: recPrio },
		function(data) {
			$("#okBody").html(data);
			$("#okDialog").modal('show');
		}
	);
});

// update the SOA fields
//
$("#soaUpdate").click( function() {
	var mname = $("#mname").val();
	var rname = $("#rname").val();
	var snum = $("#snum").val();
	var refresh = $("#refresh").val();
	var retry = $("#retry").val();
	var expire = $("#expire").val();
	var minttl = $("#minttl").val();
	var theDomain = '<?php echo $theDomain['name']; ?>';
	$.post('/Records/soaUpdate', {
		domain: theDomain,
		mname: mname,
		rname: rname,
		snum: snum,
		refresh: refresh,
		retry: retry,
		expire: expire,
		minttl: minttl },
		function(data) {
			$("#okBody").html(data);
			$("#okDialog").modal('show');
		}
	);
});
</script>
