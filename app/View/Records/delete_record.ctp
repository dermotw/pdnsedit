<div class='hero-unit'>
 <h1>Record deleted!</h1>
 <p>The <?php echo $data['Record']['type']; ?> record, <?php echo $data['Record']['content']; ?>, for <?php echo $data['Record']['name']; ?> has been deleted from PDNS database!</p>
 <p><a href='/Domains/Edit/<?php echo $data['Record']['domain_id']; ?>' class='btn btn-success btn-large'><i class='icon-ok icon-white'></i> Back to the domain page...</a></p>
</div>
