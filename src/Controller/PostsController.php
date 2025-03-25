<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.3.4
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;
use Cake\Cache\Cache;

class PostsController extends AppController
{
    public function index()
    {
        $searchTerm = $this->request->getQuery('search', '');
        $page = (int)$this->request->getQuery('page', 1);
        $limit = (int)$this->request->getQuery('limit', 10);
        
            $http = new Client();
            $response = $http->get('https://jsonplaceholder.typicode.com/posts');
            $posts = $response;
            
            if ($response->isOk()) {
                $posts = $response->getJson();
            }

        
        if (!empty($searchTerm)) {
            $searchLower = strtolower($searchTerm);
            $posts = array_filter($posts, function($post) use ($searchLower) {
                $title = strtolower($post['title']);
                $body = strtolower($post['body']);
                return strpos($title, $searchLower) !== false || 
                       strpos($body, $searchLower) !== false;
            });
        }
        
        $totalPosts = count($posts);
        $totalPages = ceil($totalPosts / $limit);
        $page = max(1, min($page, $totalPages));
        $offset = ($page - 1) * $limit;
        $paginatedPosts = array_slice($posts, $offset, $limit);

        $this->set(compact('paginatedPosts', 'searchTerm', 'page', 'limit', 'totalPosts', 'totalPages'));
    }
}
