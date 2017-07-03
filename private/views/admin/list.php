<div class="content-width">

    <div class="top-section">
        <h1>Events</h1>
        <button id="new_event">New</button>
    </div>
    <table class="events">
        <thead>
            <tr>
                <th>Name</th>
                <th>From</th>
                <th>To</th>
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
                            <td data-th="Name"><?= $event->name ?></td>
                            <td data-th="From"><?= $event->from ?></td>
                            <td data-th="To"><?= $event->to ?></td>
                            <td data-th="Created by"><?= $event->created_by ?></td>
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
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="from" placeholder="From" data-toggle="datepicker">
        <input type="text" name="to" placeholder="To" data-toggle="datepicker">
        <button type="submit">Save</button>
    </form>
</div>



