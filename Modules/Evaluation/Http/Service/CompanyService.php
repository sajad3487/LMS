<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\CompanyRepository;

class CompanyService
{
    /**
     * @var CompanyRepository
     */
    private $companyRepo;

    public function __construct(
        CompanyRepository $companyRepository
    )
    {
        $this->companyRepo = $companyRepository;
    }

    public function getAllCompanies (){
        return $this->companyRepo->getAll();
    }

    public function createCompany ($data){
        return $this->companyRepo->create($data);
    }

    public function updateCompany ($data,$id){
        return $this->companyRepo->update($data,$id);
    }

    public function deleteCompany ($id){
        return $this->companyRepo->delete($id);
    }

    public function getCompanyById ($id){
        return $this->companyRepo->getById($id);
    }

}
