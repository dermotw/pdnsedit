<div id='editRecord' class='modal hide fade'>
 <div class='modal-header'>
  <h3>Edit a record</h3>
 </div>
 <div class='modal-body'>
 <form id="RecordEditForm" action="/Records/updateRecord" class="form-horizontal" method="POST">
  <label>Name</label>
  <input id='recName' name="name" type="text" class="span2" value=' '>
  <label>Content</label>
  <input id='recContent' name="content" type="text" class="span2" placeholder="xxx.xxx.xxx.xxx"><br/><br/>
 </form>
 </div>
 <div class='modal-footer'>
  <a class='btn' data-dismiss='modal' href='#'>Cancel</a>
  <a id='editOk' class='btn btn-primary' href='#'><i class='icon-ok icon-white'></i> Update</a>
 </div>
</div>
<script type='text/javascript'>
$("#editOk").click( function(event) {
        event.preventDefault();
        var recName = $("#recName").attr('value');
        var recContent = $("#recContent").attr('value');
        var editURL = $("#RecordEditForm").attr("action");
        $("#RecordEditForm").attr( 'action', editURL + "/" + recName + "/" + recContent );
	$("#RecordEditForm").submit();
});
</script>
