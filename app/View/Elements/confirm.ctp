<div id='<?php echo $confirmId; ?>' class='modal hide fade'>
 <div class='modal-header'>
  <h3><?php echo $confirmHdr; ?></h3>
 </div>
 <div class='modal-body'>
  <p id='<?php echo $confirmId; ?>_confirmBody'><?php echo $confirmText; ?></p>
 </div>
 <div class='modal-footer'>
  <a class='btn' data-dismiss='modal' href='#'>Cancel</a>
  <a id='<?php echo $confirmId; ?>_btnConfirm' class='btn btn-danger' href='<?php echo $confirmAction ?>'><i class='icon-trash icon-white'></i>Delete</a>
 </div>
</div>
