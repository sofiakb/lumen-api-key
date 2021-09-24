<?php

namespace Sofiakb\Lumen\ApiKey\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Sofiakb\Lumen\ApiKey\Services\ApiKeyService;
use Sofiakb\Utils\Helpers;

class ApiKeyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(ApiKeyService $service)
    {
        if (($input = Request::input()) === null || count($input) === 0)
            return $this->view($service);
        else if (($method = Request::input('method')) && method_exists($this, $method))
            return $this->$method(Request::input('action'), collect($input)->except(['method', 'action'])->toArray());
        else throw new \Exception("Cannot understand what do you want to do");
    }

    public function view(ApiKeyService $service)
    {
        View::addNamespace('ApiKey', __DIR__ . '/../../../resources/views');
        return View::make('ApiKey::index')->with('keys', $service->keys())
            ->with('headers', $service->headers());
    }

    public function post($action, $data = null)
    {
        $actions = array(
            'store',
            'edit',
            'destroy',
        );

        if (!in_array($action, $actions))
            throw new \Exception("L'action $action n'existe pas");

        $service = new ApiKeyService();
        return $service->$action(Helpers::toObject($data));
    }
}
