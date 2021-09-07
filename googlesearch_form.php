<?php
require_once("{$CFG->libdir}/formslib.php");

class googlesearch_form extends moodleform {

    function definition() {
        global $CFG;
        $searchterm = null;
        $mform =& $this->_form;
        $attributes = array('size' => '50', 'maxlength' => '100');
        $mform->addElement('text', 'searchterm', "Suchwort festlegen", $attributes);
        $this->add_action_buttons();
        $searchterm = $mform->getElement('searchterm');
        $searchtermvalue = $searchterm->getValue();
        $this->_customdata['searchterm'] = $searchtermvalue;
        $this->set_data(searchterm);

    }
    function validation($data, $files) {
        return json_decode($data, true);//array();
    }

    public function definition_after_data() {
        parent::definition_after_data();

        $mform =& $this->_form;
        $searchterm =& $mform->getElement('searchterm');

        if (isset($searchterm->_attributes['searchterm'])) {
            $searchterm->attributes['value'] = $mform->getElement('searchterm');
        }
    }
}