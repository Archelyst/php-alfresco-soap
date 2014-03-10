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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */

namespace AlfrescoSoap;

class VersionStore extends Store {

    public function __construct($session) {
        parent::__construct($session, "version2Store");
    }

    public function __toString() {
        return $this->scheme . "://" . $this->address;
    }

}
