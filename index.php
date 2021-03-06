<?php

require_once "controllers/template.controller.php";
require_once "controllers/warehouse.controller.php";
require_once "controllers/document-type.controller.php";
require_once "controllers/jurisdiction.controller.php";
require_once "controllers/customs-broker.controller.php";
require_once "controllers/bulking-agent.controller.php";
require_once "controllers/foreign-agent.controller.php";
require_once "controllers/shipping-agent.controller.php";
require_once "controllers/carriers.controller.php";
require_once "controllers/area.controller.php";
require_once "controllers/position.controller.php";
require_once "controllers/employee.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/concept.controller.php";
require_once "controllers/containers.controller.php";
require_once "controllers/container-type.controller.php";
require_once "controllers/goods-services.controller.php";
require_once "controllers/vendors.controller.php";
require_once "controllers/customers.controller.php";

require_once "models/warehouse.model.php";
require_once "models/document-type.model.php";
require_once "models/jurisdiction.model.php";
require_once "models/customs-broker.model.php";
require_once "models/bulking-agent.model.php";
require_once "models/foreign-agent.model.php";
require_once "models/shipping-agent.model.php";
require_once "models/carriers.model.php";
require_once "models/area.model.php";
require_once "models/position.model.php";
require_once "models/employee.model.php";
require_once "models/users.model.php";
require_once "models/concept.model.php";
require_once "models/containers.model.php";
require_once "models/container-type.model.php";
require_once "models/goods-services.model.php";
require_once "models/vendors.model.php";
require_once "models/customers.model.php";

$template = new ControllerTemplate();
$template->ctrTemplate();
