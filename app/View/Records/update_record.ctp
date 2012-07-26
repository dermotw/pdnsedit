<div class='hero-unit'>
 <h1>Record updated!</h1>
 <p>The <?php echo $oldData['Record']['type']; ?> record, <?php echo $oldData['Record']['name'] ?> has been updated with the following content:</p>
 <h3>Name</h3>
 <p><em><?php echo $data['name']; ?></em></p>
 <h3>Content</h3>
 <p><em><?php echo $data['content']; ?></em></p>
 <p><a href='/Domains/edit/<?php echo $oldData['Record']['domain_id']; ?>' class='btn btn-success btn-large'><i class='icon-thumbs-up icon-white'></i> Back to the domain's page...</a></p>
</div>
