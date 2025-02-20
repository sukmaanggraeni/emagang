<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\AdminModel;
use App\Models\InstansiModel;
use App\Models\JurusanModel;
use App\Models\ProdiModel;
use App\Models\AnakMagangModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\HTTP\Cookie\CookieFactory;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    protected $adminModel;
    protected $instansiModel;
    protected $jurusanModel;
    protected $prodiModel;
    protected $anakMagangModel;
    protected $session;
    // public function __construct(AdminModel $adminModel)
    // {
    //     $this->adminModel = $adminModel;
    // }

    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->adminModel = new AdminModel();
        $this->instansiModel = new InstansiModel();
        $this->jurusanModel = new JurusanModel();
        $this->prodiModel = new ProdiModel();
        $this->anakMagangModel = new AnakMagangModel();
        $this->session = \Config\Services::session();
        $this->session = session();
        session();

        // E.g.: $this->session = \Config\Services::session();
    }
}
