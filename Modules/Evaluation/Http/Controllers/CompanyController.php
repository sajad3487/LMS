<?php

namespace Modules\Evaluation\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\CompanyRequest;
use Modules\Evaluation\Http\Service\CompanyService;

class CompanyController extends Controller
{
    /**
     * @var CompanyService
     */
    private $companyService;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(
        CompanyService $companyService,
        UserService $userService
    )
    {
        $this->companyService = $companyService;
        $this->userService = $userService;
    }
    public function index()
    {
        $companies = $this->companyService->getAllCompanies();
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.companies',compact('companies','user'));
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->all();
        $company = $this->companyService->createCompany($data);
        return back();
    }
    public function update(CompanyRequest $request, $id)
    {
        $data = $request->all();
        $this->companyService->updateCompany($data,$id);
        return back();
    }

    public function destroy($id)
    {
        $this->companyService->deleteCompany($id);
        return back();
    }
}
