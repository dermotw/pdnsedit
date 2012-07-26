<?php
$this->Paginator->options(array(
 'update' => '#domainList',
 'evalScripts' => true,
 'url' => array('controller' => 'Domains', 'action' => 'listDomains', 'updateId' => 'domainList' ),
));

?>
 <table class='table table-striped'>
  <thead>
  <tr>
   <th>Domain name</th>
  </tr>
  </thead>
  <tbody>
    <tr><td colspan='2'>
        <?php echo $this->Paginator->prev();?>
        <?php echo $this->Paginator->numbers( array( 'first' => 2, 'last' => 2, 'modulus' => 3 )); ?>
        <?php echo $this->Paginator->next(); ?>
    </td></tr>
<?php foreach ( $domains as $domain ): ?>
<tr><td><?php echo $domain['Domain']['name']; ?></td><td width='10%'><a href="Domains/edit/<?php echo $domain['Domain']['id']; ?>"><i class="icon-edit"></i></a></td></tr>
<?php endforeach; ?>
  </tbody>
 </table>
</div>
<?php echo $this->Js->writeBuffer(); ?>
