<?php
return [
    'app_id'            => 'wx49ba939a016a70c9',
    'app_secret'        => '6e22a9cf40d1e53db86b3ee43d0274a4',
    'login_url'         => "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
    'access_token_url'  => "https://api.weixin.qq.com/cgi-bin/token?" .
        "grant_type=client_credential&appid=%s&secret=%s",
    'max_qr_code_url'   => "https://api.weixin.qq.com/wxa/getwxacodeunlimit?".
        "access_token=%s",
];
