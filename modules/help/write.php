<?php
///////////////////////////////////////////////////////////////////////////////////////
// PHPizabi 2.01 Alpha [Madison]                             http://www.phpizabi.org //
///////////////////////////////////////////////////////////////////////////////////////
//                                                                                   //
// Please read the LICENSE.md & README.md file before using/modifying this software  //
//                                                                                   //
// Developing Author:       Andrew James, RubberDucky - andy@phpizabi.org            //
// Last modification date:  December 13th, 201                                       //
// Version:                 PHPizabi 2.01 Alpha                                      //
//                                                                                   //
// (C) 2005, 2006 Real!ty Medias                                                     //
// (C) 2007-2012 AndyJames.Org                                                       //
//                                                                                   //
// PHPizabi Is the work of a very talented development team. This script is our      //
// Pride and Joy. We hope that you enjoy using this software as much as we enjoy     //
// Developing it for you. If you need anything: http://www.phpizabi.org              //
//                                                                                   //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("write");
	
	if (isset($_POST["Submit"]) && me("is_administrator")) {
		
		myQ("
			INSERT INTO `[x]help`
			(`origin`,`title`,`body`,`username`)
			VALUES
			('{$_POST["origin"]}','{$_POST["title"]}','{$_POST["body"]}','".me("username")."')
		");
		
		$tpl -> Zone("saved", "show");
		$tpl -> AssignArray(array("new.id" => mysql_insert_id()));

	}
	
	$tpl -> AssignArray(array("origin" => $_GET["origin"]));
	
	$tpl -> CleanZones();
	$tpl -> Flush();

?>