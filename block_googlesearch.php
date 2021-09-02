<?php
require_once('googlesearch_form.php');

class block_googlesearch extends block_base {
    public function init() {
        $this->title = get_string('googlesearch', 'block_googlesearch');

    }
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content         =  new stdClass;
        $this->content->items  = array();
        $jsonResponse = file_get_contents("https://customsearch.googleapis.com/customsearch/v1?cx=fd58b2a4eb55453c2&num=10&q=Moodle%20Blocks&key=[API-KEY]]");
        $jsonDecoded = json_decode($jsonResponse, true);
        $titles = array();
        $links = array();
        $snippets = array();
        foreach($jsonDecoded["items"] as $key=>$value){
            $titles[] = $value["title"];
            $links[] = $value["link"];
            $snippets[] = $value["snippet"];
        }
        $resultString = "";
        for ($i = 0; $i<count($titles);$i++) {
            $resultString .= "Titel: ".$titles[$i]."<br>Link: <a href='$links[$i]' target='_blank'>".$links[$i]."</a><br>Summary: ".$snippets[$i]."<br><br>";
        }
        $this->content->text = $resultString;

        $url = new moodle_url('/blocks/googlesearch/view.php');
        $this->content->footer = html_writer::link($url, "Suchwort ändern");
        return $this->content;
    }
}

