<?php

require_once('../../config.php');
require_once('googlesearch_form.php');


$simplehtml = new googlesearch_form();

$simplehtml->display();
echo print_r($simplehtml->get_data());
if ($fromform = $simplehtml->get_data()) {

    $url = new moodle_url('/', array('searchterm' => $fromform['searchterm']));
    redirect($url);
}
?>