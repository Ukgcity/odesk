<?php

  require('outputArray.php');

  /* NOTE */
  $colors = array("green", "blue", "yellow", "pink");

  $data = array(
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

  $outputArray = new outputArray($data, $colors);

  echo $outputArray->getTable();

?>