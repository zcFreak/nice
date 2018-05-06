<?php  
header("Content-type: text/html; charset=utf-8");  
$urls='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=***************&secret=*******';  
$str=file_get_contents($urls);  
//var_dump($str);die;  
//$str='{"access_token":"sKg3SlkTqSYk4BUkHYvkTbkQNWoovUT6vDOONLluMR8i3lWiSw84-uKvMkDZ-Eu0bsL8I_O-K6G7RIbtwXCbtiFfxn6rmXVOwVm4sSSTLiUYNCgADAMBQ","expires_in":7200}';  
$new_str=json_decode($str,true);  
$token=$new_str['access_token'];  
//echo $token;die;  
//$token='sKg3SlkTqSYk4BUkHYvkTbkQNWoovUT6vDOONLluMR8i3lWiSw84-uKvMkDZ-Eu0bsL8I_O-K6G7RIbtwXCbtiFfxn6rmXVOwVm4sSSTLiUYNCgADAMBQ';  
define("ACCESS_TOKEN", $token);  
//创建菜单  
function createMenu($data){  
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".ACCESS_TOKEN);  
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');  
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
    $tmpInfo = curl_exec($ch);  
    if (curl_errno($ch)) {  
        return curl_error($ch);  
    }  
  
    curl_close($ch);  
    return $tmpInfo;  
//    作为朋友： 你若为我付出， 我绝对不会把你辜负。 作为爱人： 你若敢在我身上赌， 我会拼命不让你输！ 这就是以心换心！ 你真我更真，你假我转身！  
  
}  
  
//获取菜单  
function getMenu(){  
    return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".ACCESS_TOKEN);  
}  
  
//删除菜单  
function deleteMenu(){  
    return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".ACCESS_TOKEN);  
}  
  
  
  
  
  
$data = '{  
  
"button":[  
{  
           "name":"水果派对",  
           "sub_button":[  
           {  
               "type":"view",  
               "name":"水果商城",  
               "url":"http://120.25.102.29/1-160310113037/index.html"  
            },  
            {  
               "type":"view",  
               "name":"今日特价",  
               "url":"http://v.qq.com/"  
            }]  
       },  
      {  
           "name":"水果在线",  
           "sub_button":[  
           {  
               "type":"view",  
               "name":"水果秘籍",  
               "url":"http://www.soso.com/"  
            },  
            {  
               "type":"view",  
               "name":"人气选择",  
               "url":"http://v.qq.com/"  
            } ,  
            {  
               "type":"view",  
               "name":"开心一刻",  
               "url":"http://v.qq.com/"  
            }]  
       },  
          {  
           "name":"会员中心",  
           "sub_button":[  
            {  
               "type":"view",  
               "name":"个人中心",  
               "url":"http://120.25.102.29/phpinfo.php"  
            },  
            {  
               "type":"view",  
               "name":"意见反馈",  
               "url":"http://v.qq.com/"  
            }  
            ]  
       }]  
}';  
  
  
  
echo createMenu($data);  