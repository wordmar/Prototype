<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @param $req_id
     * @return mixed
     */
    public static function getRequirementById($req_id)
    {
        $requirement = Requirement::whereReq_id($req_id)->firstOrFail();

        return $requirement;
    }

    /**
     * @param array $dataArr
     * @param $requirement
     */
    public static function setRequirement(array $dataArr, Requirement $requirement)
    {
        $requirement->title = $dataArr['title'];
        $requirement->content = $dataArr['content'];
    }

    /**
     * @param  string $userName
     * @return mixed
     */
    public static function getRequirementsByUserId($userName)
    {
        $requirements = Requirement::where('user_id', $userName)->get();

        return $requirements;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllRequirements()
    {
        $requirements = Requirement::all();

        return $requirements;
    }

    /**
     * @param  array $dataArr
     * @param $user
     * @return Requirement
     */
    public static function getNewRequirement(array $dataArr, $user)
    {
        $req_id = uniqid();
        /** @var Requirement $requirement */
        $requirement = new Requirement(array(
            'title' => $dataArr['title'],
            'content' => $dataArr['content'],
            'req_id' => $req_id,
            'user_id' => $user->name
        ));
        return $requirement;
    }

    public static function saveRequirement(Model $model)
    {
//        dd($model);
        $model->save();
    }
}
