<?php

namespace App\Controllers;

use App\Libraries\JsonContentRepository;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    /**
     * @var list<string>
     */
    protected $helpers = ['url', 'content'];

    protected JsonContentRepository $contentRepository;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->contentRepository = new JsonContentRepository();
    }

    protected function sharedPageData(array $content, array $meta, bool $isHomePage = false): array
    {
        $path = trim(service('uri')->getPath(), '/');

        return [
            'contact'     => $content['contact'] ?? [],
            'currentPath' => $path === '' ? '/' : '/' . $path,
            'isHomePage'  => $isHomePage,
            'librarySections' => $content['librarySections'] ?? [],
            'meta'        => $meta,
            'navigation'  => $content['navigation'] ?? [],
            'sections'    => $content['sections'] ?? [],
            'site'        => $content['site'] ?? [],
        ];
    }
}
