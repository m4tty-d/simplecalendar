<div class="content-width">

    <div class="top-section">
        <h1>Events</h1>
        <button id="new_event">New</button>
    </div>
    <table class="events">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start</th>
                <th>End</th>
                <th>Created by</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

                <?php
                if(isset($data['events'])) {
                    foreach($data['events'] as $event) {
                        ?>
                        <tr>
                            <td data-th="Title"><?= $event->title ?></td>
                            <td data-th="Start"><?= $event->start ?></td>
                            <td data-th="End"><?= $event->end ?></td>
                            <td data-th="Created by"><?= $event->username ?></td>
                            <td><a href="">delete</a>  / <a href="">edit</a></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "No event has yet been created.";
                }
                ?>

        </tbody>
    </table>
</div>

<div class="insert-box">
    <div class="background-overlay"></div>
    <form id="insert-form" type="post">
        <h1>New event</h1>
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="start" placeholder="Start" data-toggle="datepicker">
        <input type="text" name="end" placeholder="End" data-toggle="datepicker">
        <button type="submit">Save</button>
    </form>
</div>



