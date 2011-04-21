<?php require_once('civimobile.header.php'); ?>

<div data-role="page" data-theme="b" id="jqm-home"> 
	<div id="jqm-homeheader" data-role="header">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	</div> 
	
	<div data-role="content"> 
        <ul id="main-events-list" data-role="listview" data-inset="true" >
	   <li data-role="list-divider">Upcoming Events</li>
        <?php 	
        $params = array ('version' =>'3');
        $results=civicrm_api("Event","get",$params);
        $events = $results['values'];
        foreach($events as $key => $event) { ?>
            
            <li role="option" tabindex="-1" data-theme="c" id="event-<?php print $event['id']; ?>" >
                <a href="/civimobile/participants&event_id=<?php print $event['id']; ?>" data-role="participants-<?php print $event['id']; ?>">
                <?php print $event['title']; ?></a>
            </li>
            
        <?php    } ?>
        </ul>

	   <ul id="activities-list" data-role="listview" data-inset="true">
	   <li data-role="list-divider">Your Activities</li>
	   <?php 
	    global $user;
	    
	    // get current user's contact ID
	    $params = array ('version' =>'3', 'uf_id' => $user->uid );
        $results=civicrm_api("UF_match","get",$params);
	    
	    $contactID = $results['values']['contact_id'];
	    print $contact_id;
	    $params = array ('version' =>'3', 'contact_id' =>$contactID, 'rowCount' => '5');
        $results= civicrm_api("Activity","get",$params);
        $activities = $results['values'];
        foreach($activities as $key => $activity) { ?>
            
            <li tabindex="-1" data-theme="c" >
                <?php print $activity['subject']; ?>
            </li>
            
        <?php    } ?>
        </ul>
    
	</div>
	    <div data-role="footer" data-id="global-footer" data-position="fixed" data-theme="a">
	<div data-role="navbar" data-theme="a">
      <ul>
        <li><a href="/civimobile/contact" data-icon="search" data-ajax="false">Contacts</a></li>
        <li><a href="/civimobile/events" data-icon="grid" data-ajax="false">Events</a></li>
      </ul>
    </div><!-- /navbar -->
    </div><!-- /footer -->  
</div> 

<?php require('civimobile.footer.php'); ?>
