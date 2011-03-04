
<?
    $contact_id=$param;
//@kyle: any idea why it doesn't work? 
   //$contact_id=(int)$param;
    $results=civicrm_api("Contact","get", array ('sequential' =>'1', 'version'=>3, 'contact_id' => $contact_id, 'return' =>'display_name,email,phone,tag,group'));	
    $contact = $results['values'][0];

//print_r($contact);
 ?>

<? 
include('civimobile.header.php');
?>
<div data-role="page" data-theme="b" id="jqm-contacts">

 <div data-role="header" data-theme="b">
    <!--h1>Contact details</h1>
    <a href="../../" data-icon="home" data-iconpos="notext" data-direction="reverse" class="ui-btn-right jqm-home">Home</a-->

    <div data-role="navbar">
      <ul>
        <li><a href="/civimobile/contact" class="ui-btn-active">Contacts</a></li>
        <li><a href="/civimobile/events">Events</a></li>

      </ul>
    </div><!-- /navbar -->
        <a href="#" class="ui-btn-active" data-rel="back" data-icon="arrow-l" class="ui-btn-right">Back</a>
  </div><!-- /header -->
	
	<div data-role="content" id="contact-content"> 
<h3><?= $contact['display_name'];?></h3>
<div><a href="mailto:<?= $contact['email'];?>"><?= $contact['email'];?></a></div>
<div><a href="tel:<?= $contact['phone'];?>"><?= $contact['phone'];?></a></div>
<div><?= $contact['group'];?></div>
<div><?= $contact['tag'];?></div>
	</div> 
</div> 

<? require('civimobile.footer.php'); ?>
