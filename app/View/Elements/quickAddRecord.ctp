<div class="span4">
 <h2>Quick Record</h2>
 <p>Use this form to quickly add a record to a domain.</p>
 <form id="RecordAddForm" action="/Records/add" class="form-horizontal" method="POST">
  <label>Domain</label>
  <input id='domain' name="domain" type="text" class="span2" placeholder="example.com">
  <label>Value</label>
  <input name="name" type="text" class="span2" placeholder="www.example.com">
  <label>Type</label>
  <input name="type" type="text" class="span2" placeholder="A, AAAA, CNAME, PTR, etc...">
  <label>Content</label>
  <input name="content" type="text" class="span2" placeholder="xxx.xxx.xxx.xxx"><br/><br/>
  <input type="submit" class="btn btn-primary" value="Add">
 </form>
</div>

