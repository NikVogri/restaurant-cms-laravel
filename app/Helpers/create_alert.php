<?php

use App\Alert;

function create_alert($type)
{
  Alert::create(['alert_type' => $type]);
}