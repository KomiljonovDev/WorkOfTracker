<?php

require 'WorkDay.php';
$workDay = new WorkDay();

if (isset($_POST['name']) && isset($_POST['arrived_at']) && isset($_POST['leaved_at'])) {
    if (!empty($_POST['name']) && !empty($_POST['arrived_at']) && !empty($_POST['leaved_at'])) {
        $workDay->store($_POST['name'], $_POST['arrived_at'], $_POST['leaved_at']);
    }
}
$records = $workDay->getWorDayList();

require 'view.php';

?>