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

use AlfrescoSoap\WebService\WebServiceFactory;

class Predicate extends BaseObject {

    private $_store;

    private $_nodes;

    private $_query;

    /**
     * Constructor
     */
    public function __construct($nodes, $store) {
        $this->_nodes = $nodes;
        $this->_store = $store;
        $this->_query = null;
    }

    public function __toArray() {
        $nodes = array();
        if (is_array($this->_nodes) == true) {
            foreach ($this->_nodes as $node) {
                $nodes[] = $node->__toArray();
            }
        }
        return array(
                "nodes" => $nodes,
                "store" => $this->_store->__toArray(),
                "query" => null
        );
    }

}
