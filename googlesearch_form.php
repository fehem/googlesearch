<?php
require_once("{$CFG->libdir}/formslib.php");

class googlesearch_form extends moodleform {

    function definition() {
        global $CFG;
        /*$current = $this->_customdata['current'];*/

        $mform =& $this->_form;
        $attributes = array('size' => '50', 'maxlength' => '100');
        $mform->addElement('text', 'searchterm', "Suchwort festlegen", $attributes);
        $this->add_action_buttons();
        $searchterm = $mform->getElement('searchterm');
        $searchtermvalue = $searchterm->getValue();
/*        $this->_customdata['searchterm'] = $searchtermvalue;
        $this->set_data(searchterm);*/

    }
    function validation($data, $files) {
        return array();
    }

}