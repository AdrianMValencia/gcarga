<?php

require_once "controllers/template.controller.php";
require_once "controllers/warehouse.controller.php";
require_once "controllers/document-type.controller.php";
require_once "controllers/jurisdiction.controller.php";
require_once "controllers/customs-broker.controller.php";
require_once "controllers/bulking-agent.controller.php";
require_once "controllers/foreign-agent.controller.php";

require_once "models/warehouse.model.php";
require_once "models/document-type.model.php";
require_once "models/jurisdiction.model.php";
require_once "models/customs-broker.model.php";
require_once "models/bulking-agent.model.php";
require_once "models/foreign-agent.model.php";

$template = new ControllerTemplate();
$template->ctrTemplate();
