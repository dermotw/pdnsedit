<?php

$results = $this->requestAction('Domains/index');
$domains = $results['domains'];
?><ol><?php
foreach ( $domains as $domain ): ?>
        <li><?php echo $domain['Domain']['name']; ?></li>
<?php

endforeach;

?>
</ol>
<?php

echo $this->Paginator->numbers(array('first' => 'First Page'));

?>

