<?php

include 'config/frontend/config.php';

$frontend = new Frontend();
print_r($frontend->tabelProduct()->get_all());
