
<?php
    $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


    $parse_url = parse_url($url, PHP_URL_PATH);
    
    
    // get last arg of path (contact id)
    $contact_id = end(split('/', $parse_url));
    $results = civicrm_api("Contact","get", 
                    array ( 'sequential' =>'1', 
                            'version'=>3, 
                            'contact_id' => $contact_id, 
                            'return' =>'display_name,email,phone,tag,group,contact_type,street_address,city,postal_code,state_province')
                            );	
    $contact = $results['values'][0];
    
   // $contrib_params = array ('version' =>'3', 'contact_id' =>$contact_id};
    $contrib_results=civicrm_api("Contribution","get",
                            array ( 'sequential' =>'1', 
                                    'version'=>3, 
                                    'contact_id' => $contact_id) 
                                    );
    ?>

<?php 
include('civimobile.header.php');
?>
<div data-role="page" data-theme="b" id="jqm-contacts">

 <div data-role="header" data-theme="b">
    <h3><?php print $contact['display_name'];?></h3>
    	    <a href="/civimobile/civimobile" data-ajax="false" data-direction="reverse" data-role="button" data-icon="home" data-iconpos="notext" class="ui-btn-right jqm-home">Home</a>

  </div><!-- /header -->
	
	<div data-role="content" id="contact-content"> 
        <div class="contact-type">
        <?php if ($contrib_results['count'] > 0) : 
                print 'This '.$contact['contact_type'].' has made '.$contrib_results['count'].' contribution'; 
                if ($contrib_results['count'] >1) :print 's';
                endif;
                else :
                print 'Contact type: '.$contact['contact_type'];
               endif; ?>
        </div>
<div class="vcard">
  <div class="tel">
    
   <?php if ($contact['phone'] =='') : echo 'No phone number for contact'; else: ?>
     <a href="tel:<?php print $contact['phone'];?>" data-role="button">
      <span class="type">Phone :</span> <?php print $contact['phone'];?>
     </a>
   <?php endif; ?>
  </div>
  <?php if ($contact['email'] != '') : ?>
  <div> 
   <span class="email">
          <a href="mailto:<?php print $contact['email'];?>" data-role="button">Email: <?php print $contact['email'];?></a>
      </span>
  </div>  
  <?php endif; ?>

  <div class="adr">
    <div class="street-address"><?php print $contact['street_address'];?></div>
    <span class="locality"><?php print $contact['city'];?></span><?php if($contact['city'] != '') : ?>,<?php endif; ?>  
    <abbr class="region" title="<?php print $contact['state_province'];?>"><?php print $contact['state_province'];?></abbr>&nbsp;
    <span class="postal-code"><?php print $contact['postal_code'];?></span>
    <div class="country-name"><?php print $contact['country'];?></div>
  </div>

</div>    
            
        <div><?php print $contact['group'];?></div>
        <div><?php print $contact['tag'];?></div>
	</div> 

<script language="javascript" type="text/javascript">
			function getLocation() {
				// Get location no more than 10 minutes old. 600000 ms = 10 minutes.
				navigator.geolocation.getCurrentPosition(showLocation, showError, {enableHighAccuracy:true,maximumAge:600000});
			}
 
			function showError(error) {
				alert(error.code + ' ' + error.message);
			}
 
			function showLocation(position) {
				geoinfo.innerHTML='<p>Latitude: ' + position.coords.latitude + '</p>' 
				+ '<p>Longitude: ' + position.coords.longitude + '</p>' 
				+ '<p>Accuracy: ' + position.coords.accuracy + '</p>' 
				+ '<p>Altitude: ' + position.coords.altitude + '</p>' 
				+ '<p>Altitude accuracy: ' + position.coords.altitudeAccuracy + '</p>' 
				+ '<p>Speed: ' + position.coords.speed + '</p>' 
				+ '<p>Heading: ' + position.coords.heading + '</p>';
			}
        
		</script>


</div> 

<?php require('civimobile.footer.php'); ?>
