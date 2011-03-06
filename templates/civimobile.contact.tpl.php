
<?php
    $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


    $parse_url = parse_url($url, PHP_URL_PATH);
    
    
    // get last arg of path (contact id)
    $contact_id = end(split('/', $parse_url));
    $results    = civicrm_api("Contact","get", 
                    array ( 'sequential' =>'1', 
                            'version'=>3, 
                            'contact_id' => $contact_id, 
                            'return' =>'display_name,email,phone,tag,group')
                            );	
    $contact = $results['values'][0];
    ?>

<?php 
include('civimobile.header.php');
?>
<div data-role="page" data-theme="b" id="jqm-contacts">

 <div data-role="header" data-theme="b">
    <h3><?php print $contact['display_name'];?></h3>
  </div><!-- /header -->
	
	<div data-role="content" id="contact-content"> 
        
        <div class="contact-email-address">
            <?php if ($contact['email'] =='') : echo 'No email address for contact'; else: ?>
            <a href="mailto:<?php print $contact['email'];?>" data-role="button"><?php print $contact['email'];?></a>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($contact['phone'] =='') : echo 'No phone number for contact'; else: ?>
            <a href="tel:<?php print $contact['phone'];?>" data-role="button"><?php print $contact['phone'];?></a></div>
            <?php endif; ?>
        <div><?php print $contact['group'];?></div>
        <div><?php print $contact['tag'];?></div>
	</div> 
</div> 

<?php require('civimobile.footer.php'); ?>
