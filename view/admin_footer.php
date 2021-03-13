 <div class="links">
    <?php if ($action != 'vehicles_list') { ?>
        <p><a href="?action=vehicles_list">View Full Vehicle List</a></p>
    <?php } ?>

    <?php if ($action != 'add_vehicle_form') { ?>
        <p><a href="?action=add_vehicle_form">Click here</a> to add a vehicle</p>
    <?php } ?>

    <?php if ($action != 'makes_list') { ?>
        <p><a href="?action=makes_list">View/Edit Vehicle Makes</a></p>
    <?php } ?>

    <?php if ($action != 'types_list') { ?>
        <p><a href="?action=types_list">View/Edit Vehicle Types</a></p>
    <?php } ?>

    <?php if ($action != 'classes_list') { ?>
        <p><a href="?action=classes_list">View/Edit Vehicle Classes</a></p>
    <?php } ?>
 </div>
</main>
<footer>
    <p class="copyright">&copy; <?= date("Y"); ?> Zippy Used Autos</p>
</footer>
</body>
</html>