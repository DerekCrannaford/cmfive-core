<?php
$form['User Details'][]=array(
array("Login","text","login"),
array("Admin","checkbox","is_admin"),
array("Active","checkbox","is_active"),
array("External", "checkbox", "is_external"),
	array("Language", "select", "language", null, $availableLocales));

$form['User Details'][] = array(
	array("Password", "password", "password"),
	array("Repeat Password", "password", "password2"));

$form['Contact Details'][] = array(
	array("First Name", "text", "firstname"),
	array("Last Name", "text", "lastname"));
$form['Contact Details'][] = array(
	array("Title", "autocomplete", "title", null, $w->Lookup->getLookupByType("title")),
	array("Email", "text", "email"));

$roles = $w->Auth->getAllRoles();
$roles = array_chunk($roles, 4);
foreach ($roles as $r) {
	$row = array();
	foreach ($r as $rf) {
		$row[] = array($rf, "checkbox", "check_" . $rf);
	}
	$form['User Roles'][] = $row;
}

print Html::multiColForm($form, $w->localUrl("/admin/useradd"), "POST", "Save");
