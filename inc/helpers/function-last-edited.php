<?php
/**
 * Cache hooks and functions
 *
 * @package agt
 */

/**
 * Get last-edited timestamp
 *
 * @global array $agt_timestamps cached timestamp values
 *
 * @param string $asset ID of asset type
 *
 * @return int UNIX timestamp
 */
function agt_last_edited($asset = 'css') {

  global $agt_timestamps;

  // save timestamps to cache in global variable for this request
  if (empty($agt_timestamps)) {

    $filepath = get_template_directory() . '/assets/last-edited.json';

    if (file_exists($filepath)) {
      $json = file_get_contents($filepath);
      $agt_timestamps = json_decode($json, true);
    }

  }

  // use cached value from global variable
  if (isset($agt_timestamps[$asset])) {
    return absint($agt_timestamps[$asset]);
  }

  return 0;

}
