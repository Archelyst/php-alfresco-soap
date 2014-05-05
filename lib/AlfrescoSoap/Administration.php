<?php
/*
 * Copyright (C) 2010 Michael Klingemann
 *
 * This file is part of Alfresco
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */

namespace AlfrescoSoap;

use AlfrescoSoap\WebService\WebServiceFactory;

class Administration extends BaseObject {

    private $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    public function queryUsers($filter=null) {
        $client = WebServiceFactory::getAdministrationService($this->_session->repository->connectionUrl, $this->_session->ticket);
        $result = $client->queryUsers(array("filter" => "a*"));
        return $result->result;
    }

}
