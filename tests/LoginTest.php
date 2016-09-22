<?php

use App\Requirement;
use App\Services\AuthService;

class LoginTest extends TestCase
{
    /**
     * 測routes的
     *
     * @return void
     */
    public function testLoginInte()
    {
        $response = $this->call('POST', '/login', ['name' => 'john', 'password' => 'secret']);
        $this->assertRegExp('/主頁面/', $response->getContent());

        $response = $this->call('POST', '/login', ['name' => 'john', 'password' => null]);
        $this->assertRegExp('/認證失敗/', $response->getContent());
    }

    /**
     *測routess的
     */
    public function testToCreateInte()
    {
        //用make，不會寫到db，用create會寫到db
        $user = factory(App\User::class)->make(['name' => 'GG']);
        $response = $this->actingAs($user)->visit('/create')->see('Create');
    }

    /**
     *測Controller的
     */
    public function testDoCreateInte()
    {
        //App\User的id要fillabel設id才有用，然後才能用id取得role，程式才能跑
        $user = new App\User(['id' => 4, 'name' => 'john']);
        $this->be($user);
        $response = $this->action('POST', 'RequirementsController@store', ['title' => 'TestTitle1', 'content' => 'TestContent1']);
        $this->assertRegExp('/新增成功/', $response->getContent());

        $user = new App\User(['id' => 6, 'name' => 'admin']);
        $this->be($user);
        $response = $this->action('POST', 'RequirementsController@store', ['title' => 'TestTitle1', 'content' => 'TestContent1']);
        $this->assertRegExp('/無新增權限/', $response->getContent());
    }

    /**
     *測mock的
     */
    public function testDoUpdateMock()
    {
        $user = new App\User(['id' => 6, 'name' => 'admin']);//故意用一個檢查不會過的，證明跑mock的
        $this->be($user);
        $mockService = Mockery::mock(AuthService::class);
        $mockService->shouldReceive('getAuthUser')->once()->andReturn($user);
        $mockService->shouldReceive('checkAuthorization')->once();
        App::instance(AuthService::class, $mockService);

        $mockModel = Mockery::mock(Requirement::class);
        $mockModel->shouldReceive('getNewRequirement')->once()->withAnyArgs()->andReturn(new Requirement());//一定要return
        $mockModel->shouldReceive('saveRequirement')->once();//上面還是要真的傳一個Requirement，不然saveRequirement會錯，它規定一定要傳值。must be an instance of Illuminate\Database\Eloquent\Model, null given
        App::instance(Requirement::class, $mockModel);

        $response = $this->action('POST', 'RequirementsController@store', ['title' => 'TestTitle2', 'content' => 'TestContent2']);
        $this->assertRegExp('/新增成功/', $response->getContent());
    }

}
