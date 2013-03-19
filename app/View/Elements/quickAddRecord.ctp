<div class="span4">
 <h2>Quick Record</h2>
 <p>Use this form to quickly add a record to a domain.</p>
 <form id="RecordAddForm" action="/Records/add" class="form-horizontal" method="POST">
  <label>Domain</label>
  <input id='recDomain' name="domain" type="text" class="span2" placeholder="example.com">
  <label>Value</label>
  <input id="recName" name="name" type="text" class="span2" placeholder="www.example.com">
  <label>Type</label>
  <input id="recType" name="type" type="text" class="span2" placeholder="A, AAAA, CNAME, PTR, etc...">
  <label>Content</label>
  <input id="recContent" name="content" type="text" class="span2" placeholder="xxx.xxx.xxx.xxx"><br/><br/>
  <input id="recAddBtn" type="button" class="btn btn-primary" value="Add">
 </form>
</div>
<script type="text/javascript">
$("#recAddBtn").click( function() {
        var recName = $("#recName").val();
        var recType = $("#recType").val();
        var recContent = $("#recContent").val();
        var recTTL = 86400;
        var recPrio = 10;
        var theDomain = $("#recDomain").val();
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
</script>
