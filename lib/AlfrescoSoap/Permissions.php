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

/**
 * Permission class
 *
 * @author Michael Klingemann
 */
class Permissions extends BaseObject {

    private $_session;

    private $_store;

    private $_nodes;

    /**
     * Constructor
     *
     * @param $node The node these permissions apply to
     */
    public function __construct($session, $store, $nodes) {
        $this->_session = $session;
        $this->_store = $store;
        $this->_nodes = $nodes;
    }

    public function getACLs() {
        $client = WebServiceFactory::getAccessControlService($this->_session->repository->connectionUrl, $this->_session->ticket);

        $pred = new Predicate($this->_nodes, $this->_store);
        $result = $client->getACLs(array(
                "predicate" => $pred->__toArray(),
                "filter" => null
        ));
        return $result->acls;
    }

    public function addACEs($authority, $permession, $hasAccess) {
        $accessStatus = $hasAccess ? "acepted" : "declined";
        $ace = array(
                "authority" => $authority,
                "permission" => $permession,
                "accessStatus" => $accessStatus
        );
        $client = WebServiceFactory::getAccessControlService($this->_session->repository->connectionUrl, $this->_session->ticket);
        $pred = new Predicate($this->_nodes, $this->_store);
        $result = $client->addACEs(array(
                "predicate" => $pred->__toArray(),
                "aces" => array(
                        $ace
                )
        ));
        return $result;
    }

    public function removeACEs($authority, $permession) {
        $accessStatus = "acepted"; // sic!
        $ace = array(
                "authority" => $authority,
                "permission" => $permession,
                "accessStatus" => $accessStatus
        );
        $client = WebServiceFactory::getAccessControlService($this->_session->repository->connectionUrl, $this->_session->ticket);
        $pred = new Predicate($this->_nodes, $this->_store);
        $result = $client->removeACEs(array(
                "predicate" => $pred->__toArray(),
                "aces" => array(
                        $ace
                )
        ));
        return $result;
    }

    public function getPermissions() {
        $client = WebServiceFactory::getAccessControlService($this->_session->repository->connectionUrl, $this->_session->ticket);
        $pred = new Predicate($this->_nodes, $this->_store);
        $result = $client->getPermissions(array(
                "predicate" => $pred->__toArray()
        ));
        return $result;
    }

    public function hasPermissions($permissions = null) {
        if ($permissions == null) {
            $permissions = array(
                    "Consumer",
                    "Contributor",
                    "Editor",
                    "Collaborator",
                    "Coordinator"
            );
        }
        else if (!is_array($permissions)) {
            $permissions = array(
                    $permissions
            );
        }
        $client = WebServiceFactory::getAccessControlService($this->_session->repository->connectionUrl, $this->_session->ticket);
        $pred = new Predicate($this->_nodes, $this->_store);
        $result = $client->hasPermissions(array(
                "predicate" => $pred->__toArray(),
                "permissions" => $permissions
        ));
        return $result;
    }

    public function getOwners() {
        $client = WebServiceFactory::getAccessControlService($this->_session->repository->connectionUrl, $this->_session->ticket);
        $pred = new Predicate($this->_nodes, $this->_store);
        $result = $client->getOwners(array(
                "predicate" => $pred->__toArray()
        ));
        return $result->results;
    }

    public function setOwners($owner) {
        $client = WebServiceFactory::getAccessControlService($this->_session->repository->connectionUrl, $this->_session->ticket);
        $pred = new Predicate($this->_nodes, $this->_store);
        $result = $client->setOwners(array(
                "predicate" => $pred->__toArray(),
                "owner" => $owner
        ));
        return $result->results;
    }

    public function setInheritPermission($inheritPermission) {
        $client = WebServiceFactory::getAccessControlService($this->_session->repository->connectionUrl, $this->_session->ticket);
        $pred = new Predicate($this->_nodes, $this->_store);
        //ACL[] setInheritPermission(Predicate predicate, xsd:boolean inheritPermission)
        $result = $client->setInheritPermission(array(
                "predicate" => $pred->__toArray(),
                "inheritPermission" => $inheritPermission
        ));
        return $result;
    }

}
