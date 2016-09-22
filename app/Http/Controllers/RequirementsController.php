<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RequirementRequest;
use App\Requirement;
use App\Role;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RequirementsController extends Controller
{
    private $authService;
    private $requirementModel;

    public function __construct(AuthService $authService, Requirement $requirement)
    {
        $this->authService = $authService;
        $this->requirementModel = $requirement;
    }

    public function store(Request $req)
    {

        try {

            $this->validateReq($req);

            $user = $this->authService->getAuthUser();
            $requirement = $this->requirementModel->getNewRequirement($req->all(), $user);

            $this->authService->checkAuthorization(AuthService::REQU_CREATE, $requirement);

            $this->requirementModel->saveRequirement($requirement);

        } catch (ValidationException $e) {
            return redirect()->back();
        } catch (Exception $e) {
            return view('result')->with('result', $e->getMessage());
        }
        return view('result')->with('result', '新增成功，id為: ' . $requirement->req_id);
    }

    /**
     * @param Request $req
     */
    private function validateReq(Request $req)
    {
        $this->validate($req, [
            'title' => 'required',
            'content' => 'required',
        ]);
    }

    public function edit($req_id)
    {
        $requirement = Requirement::getRequirementById($req_id);
        return view('requirements.edit', compact('requirement'));
    }

    public function update($req_id, RequirementRequest $req)
    {
        try {

            $requirement = Requirement::getRequirementById($req_id);

            AuthService::checkAuthorization(AuthService::REQU_UPDATE, $requirement);

            Requirement::setRequirement($req->all(), $requirement);

            Requirement::saveRequirement($requirement);

        } catch (Exception $e) {
            return view('result')->with('result', $e->getMessage());
        }
        return view('result')->with('result', '修改成功，id為: ' . $req_id);
    }

    public function delete()
    {
        return view('requirements.edit');
    }

    public function destroy($req_id)
    {
        try {
            $requirement = Requirement::getRequirementById($req_id);

            AuthService::checkAuthorization(AuthService::REQU_DELETE, $requirement);

            $requirement->delete();

        } catch (Exception $e) {
            return view('result')->with('result', $e->getMessage());
        }
        return view('result')->with('result', '刪除成功');
    }

    public function show($req_id)
    {
        $requirement = Requirement::getRequirementById($req_id);
        return view('requirements.show', compact('requirement'));
    }

    public function showAll()
    {
        $user = AuthService::getAuthUser();
        $roleName = AuthService::getRoleName($user);
        switch ($roleName) {
            case Role::NORMAL_USER:
                $requirements = Requirement::getRequirementsByUserId($user->name);
                break;
            case Role::ADMIN:
                $requirements = Requirement::getAllRequirements();
                break;

            default:
                throw new \Exception("無權限看資料");
        }
        return view('requirements.showAll', compact('requirements'));
    }

    public function create()
    {
        return view('requirements.create');
    }


}
