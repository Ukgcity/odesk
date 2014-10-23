<?php

require_once 'PHPUnit/Autoload.php';
require_once dirname(dirname(__FILE__)).'\outputArray.php';

class outputArrayTest extends PHPUnit_Framework_TestCase {
    private $colors = array("green", "blue", "yellow", "pink");

    private $data = array(
      array(
          'Name'    => 'Trixie',
          'Color'   => 'Green',
          'Element' => 'Earth',
          'Likes'   => 'Flowers'
          ),
      array(
          'Name'    => 'Tinkerbell',
          'Element' => 'Air',
          'Likes'   => 'Singning',
          'Color'   => 'Blue'
          ),
      array(
          'Element' => 'Water',
          'Likes'   => 'Dancing',
          'Name'    => 'Blum',
          'Color'   => 'Pink'
          ),
    );

    function test_input_data() {
        $outputArray = new outputArray($this->data, $this->colors);
        $this->assertEquals($outputArray->in_array,$this->data);
        $this->assertEquals($outputArray->colors,$this->colors);
    }

    function test_rows() {
        $outputArray = new outputArray($this->data, $this->colors);
        $table_header = array_keys(reset($this->data));

        foreach($this->data as $row) {
               $current_row = $outputArray->getFormattedRow($table_header,$row);
               foreach($row as $cell){
                      $this->assertContains($cell, $current_row);
               }
        }
    }

    function test_table() {
        $outputArray = new outputArray($this->data, $this->colors);
        $table_header = array_keys(reset($this->data));

        $table_content = $outputArray->getTable();

        foreach($this->data as $row) {
               $this->assertContains($outputArray->getFormattedRow($table_header,$row), $table_content);
        }
    }

    function test_colors() {
        $outputArray = new outputArray($this->data, $this->colors);
        $table_header = array_keys(reset($this->data));

        foreach($this->data as $row) {
               $i = 0;
               $current_row = $outputArray->getFormattedRow($table_header,$row);
               foreach($this->colors as $item){
                      $this->assertContains("background:".$item, $current_row);
               }
        }
    }
}

?>