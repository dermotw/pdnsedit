         <div class="hero-unit">
                <h1>PDNS Editor<h1>
                <p>Custom editor for PowerDNS zones and records.</p>
         </div>
	 <div class="row">
		<?php echo $this->element('domainList'); ?>
		<?php echo $this->element('quickAddRecord'); ?> 
		<?php echo $this->element('quickAddDomain'); ?> 
	 </div>

