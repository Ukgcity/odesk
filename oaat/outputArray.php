<?php

class outputArray{

  const column_width  = 15;/* width in symbols count */
  const row_height    = 1;
  const margin_left   = 1;
  const node_symbol   = "+";
  const row_symbol    = "-";
  const column_symbol = "|";
  const space_symbol  = " ";
  const NL            = "<br />";

  public function __construct($in_array, $colors) {
          $this->in_array = $in_array;
          $this->colors   = $colors;
  }

  public function getTable() {
          $html = "";
          $sep_line = "";
          
          $table_header = array_keys(reset($this->in_array));

          $header_html    = $this->getFormattedRow($table_header);
          $separator_html = $this->getSeparatorLine($table_header);


          $html .= $separator_html;
          $html .= $header_html;
          $html .= $separator_html;

          foreach($this->in_array as $row) {
                 $html .= $this->getFormattedRow($table_header, $row);
          }

          $html .= $separator_html;

          return "<pre>".$html."</pre>";
  }

  public function getFormattedRow($table_header, $row = false){
          $formatted_row = "";
          $i = 0;

          foreach($table_header as $head) {
                 $word_length = 0;

                 $formatted_row .= self::column_symbol;
                 $formatted_row .= "<span";
                 if(count($this->colors) > $i){
                   $formatted_row .= " style='background:".$this->colors[$i].";'";
                 }
                 $formatted_row .= ">";
                 $formatted_row .= str_repeat(self::space_symbol, self::margin_left);
                 if($row) {
                   $formatted_row .= $row[$head];
                   $word_length   .= strlen($row[$head]);
                 } else {
                   $formatted_row .= $head;
                   $word_length   .= strlen($head);
                 }
                 $formatted_row .= str_repeat(self::space_symbol, self::column_width - $word_length - self::margin_left);
                 $formatted_row .= "</span>";

                 $i++;
          }
          $formatted_row .= self::column_symbol;
          $formatted_row .= self::NL;

          return $formatted_row;
  }

  public function getSeparatorLine($table_header){
          $separator_line = "";
          foreach($table_header as $head) {
                 $separator_line .= self::node_symbol.str_repeat(self::row_symbol, self::column_width);
          }
          $separator_line .= self::node_symbol;
          $separator_line .= self::NL;

          return $separator_line;
  }

}

?>