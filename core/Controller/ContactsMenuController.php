<?php

/**
 * @copyright 2017 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2017 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OC\Core\Controller;

use OC\Contacts\ContactsMenu\Manager;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IRequest;

class ContactsMenuController extends Controller {

	/** @var Manager */
	private $manager;

	/** @var string */
	private $userId;

	/**
	 * @param IRequest $request
	 * @param string $UserId
	 */
	public function __construct(IRequest $request, $UserId, Manager $manager) {
		parent::__construct('core', $request);
		$this->userId = $UserId;
		$this->manager = $manager;
	}

	/**
	 * @NoAdminRequired
	 *
	 * @param int $page
	 * @return JSONResponse
	 */
	public function index($page = 0) {
		return $this->manager->getEntries($this->userId);
	}

}
