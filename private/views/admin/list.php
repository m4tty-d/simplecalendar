<h1>Events</h1>
<div class="events">
<?php

    if(isset($data['events'])) {

        foreach($data['events'] as $event) {
?>
            <div class="event"><?= $event->name; ?></div>

<?php
        }

    } else {

        echo "No event has been created yet.";

    }

?>
</div>
