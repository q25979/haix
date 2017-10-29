<?php
namespace Home\Controller;
use Think\Controller;

use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;

class LoginController extends Controller {
    public function index() {

        $this->display();
    }

    public function sendMsg() {
    	require_once APP_PATH.'Api/api_sdk/vendor/autoload.php';

    	// POST方式获取手机号
    	$mobile = I('post.tel');

    	Config::load();

    	$accessKeyId = "LTAIeQmnxttUo4Kh";	//自己替换自己的accessKeyId
        $accessKeySecret = "2MnljkEQslQtTJQdN3LHM2AfozY8Jv";	//自己替换自己的accessKeySecret

        $templateParam = array(
        	"code" => rand(100000, 999999)
        );

        $templateCode = "SMS_106695009";   //短信模板ID
        $signName = "广东海翔赛鸽公棚";	// 短信签名

        //短信API产品名（短信产品名固定，无需修改）
        $product = "Dysmsapi";
        //短信API产品域名（接口地址固定，无需修改）
        $domain = "dysmsapi.aliyuncs.com";
        //暂时不支持多Region（目前仅支持cn-hangzhou请勿修改）
        $region = "cn-hangzhou";

        // 初始化用户Profile实例
        $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);

        // 增加服务结点
        DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
        // 初始化AcsClient用于发起请求
        $acsClient= new DefaultAcsClient($profile);

        // 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendSmsRequest();
        // 必填，设置雉短信接收号码
        $request->setPhoneNumbers($mobile);

        // 必填，设置签名名称
        $request->setSignName($signName);

        // 必填，设置模板CODE
        $request->setTemplateCode($templateCode);

        // 可选，设置模板参数
        if($templateParam) {
            $request->setTemplateParam(json_encode($templateParam));
        }

        //发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);

        //返回请求结果
        $result = json_decode(json_encode($acsResponse), true);
        // dump($result);
        // dump(json_encode($templateParam));

        // 设置返回数据
        $returnData['code'] = json_encode($templateParam);
        $returnData['result'] = $result;

        // return $result;
        $this->ajaxReturn($returnData);
    }
}