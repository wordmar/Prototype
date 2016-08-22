<?php
/**
 * User: 014
 * Date: 2016/8/4
 * Time: 下午 05:36
 */

namespace App\Services;

use App\Providers\AuthServiceProvider;
use App\Role;
use App\User;
use Auth;
use Exception;
use Gate;

class AuthService
{
    const REQU_DELETE = AuthServiceProvider::REQU_DELETE;
    const REQU_CREATE = AuthServiceProvider::REQU_CREATE;
    const REQU_UPDATE = AuthServiceProvider::REQU_UPDATE;

    /**
     * @param User $user
     * @return Role  name
     */
    static public function getRoleName(User $user)
    {
        if ($user->hasRole(Role::ADMIN)) {
            return Role::ADMIN;
        }
        return Role::NORMAL_USER;
    }

    /**
     * @return App\User
     */
    static public function getAuthUser()
    {
        $user = Auth::user();
        return $user;
    }

    /**
     * @param $authKey
     * @param $requirement
     * @throws Exception
     */
    public static function checkAuthorization($authKey, $requirement)
    {
        // 要加break才行，不然會跑到最後一行，若沒丟例外，會一直跑到最後一行
        switch ($authKey) {
            case self::REQU_CREATE:
                if (Gate::denies($authKey, $requirement)) {
                    throw new Exception('無新增權限');
                }
                break;
            case self::REQU_UPDATE:
                if (Gate::denies($authKey, $requirement)) {
                    throw new Exception('無修改權限');
                }
                break;
            case self::REQU_DELETE:
                if (Gate::denies($authKey, $requirement)) {
                    throw new Exception('無刪除權限');
                }
                break;
            default:
                throw new \Exception("未設定此權限：" . $authKey);
        }
    }

    /**
     * @param $name
     * @param $password
     * @return mixed
     */
    public static function attempt($name, $password)
    {
        return Auth::attempt(['name' => $name, 'password' => $password]);
    }
}