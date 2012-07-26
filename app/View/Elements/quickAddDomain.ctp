<div class="span4">
<h2>Quick Domain</h2>
<p>Use this form to quickly add a new domain</p>
<p>SOA and NS records will be created automatically. You can edit these later.</p>
<form id="DomainAddForm" action="/Domains/add" class="form-horizontal" method="POST">
<label>Domain name</label>
<input id='domain' name="domain" type="text" class="span2" placeholder="example.com">
<label>TTL</label>
<input name="ttl" type="text" class="span2" value="86400"><br/><br/>
<input type="submit" class="btn btn-primary" value="Add">
</form>
</div>

