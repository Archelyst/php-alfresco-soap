<?php
/*
 * Copyright (C) 2005-2011 Alfresco Software Limited.
 *
 * This file is part of Alfresco
 *
 * Alfresco is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Alfresco is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with Alfresco. If not, see <http://www.gnu.org/licenses/>.
 */

$alfDebug = TRUE;

/** The web service end point that will be used when accessing the Alfresco repository **/
$alfURL = 'http://localhost:8080/alfresco/api';

/** Store that should be used to store the wiki content in **/
$alfWikiStore = 'workspace://SpacesStore';

/** Path to the space the contains the wiki content **/
$alfWikiSpace = 'app:company_home/cm:Wiki';

/** User credentials used to connect to Alfresco with **/
$alfUser = 'admin';
$alfPassword = 'admin';

/** Impersonation user credentials mapping **/
/*
$alfImpersonateUsers = array(
	'<lowercase-mediawiki-username-1>' => array(
		'user' => '<alfresco-user-1>',
		'password' => ''
	),
	'<lowercase-mediawiki-username-2>' => array(
		'user' => '<alfresco-user-2>',
		'password' => ''
	),
);
*/

?>