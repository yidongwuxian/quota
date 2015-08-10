<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
<title><{if $ItzView.title}><{$ItzView.title}><{else}>互联网金融创新工场<{/if}></title>
<meta name="format-detection" content="telephone=no"/>
<meta name="apple-mobile-web-app-capable" content="yes" /> 
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link rel="apple-touch-icon" sizes="57x57" href="<{Yii::app()->c->mobile.staticUrl}>/images/57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<{Yii::app()->c->mobile.staticUrl}>/images/72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<{Yii::app()->c->mobile.staticUrl}>/images/114.png" />
<link rel="shortcut icon" href="<{$CONST.cssPath}>/static/old/favicon.ico" type="image/x-icon" />
<{if $CONST.developMode}>
<link rel="stylesheet" href="<{$CONST.cssPath}>/static/wap/css/quota.css?v=<{$CONST.cssVersion}>" />
<{else}>
<link rel="stylesheet" href="<{$CONST.cssPath}>/static/wap/css/quota.min.css?v=<{$CONST.cssVersion}>" />
<{/if}>
</head>
<body>
<table class="xbank">
  <tr>
    <th>银行名称</th>
    <th>单笔额度</th>
    <th>单日额度</th>
    <th>单月额度</th>
  </tr>
  <{foreach from=$bank_limit item=item}>
  <tr>
    <td><{$item.bank_name}></td>
    <td><{($item.every_limit == -1) ? '维护中' : $item.every_limit}></td>
    <td><{($item.daily_limit == -1) ? '维护中' : $item.daily_limit}></td>
    <td><{($item.monthly_limit == -1) ? '维护中' : $item.monthly_limit}></td>
  </tr>
  <{/foreach}>
</table>
<p class="xdetail"><span>附：</span>为了让用户享受更高的支付额度和更稳定的服务，爱投资将根据充值额度和第三方支付的成功率自动选择支付通道，单笔限额取决于当时自动选择的第三方支付的限额。如用户设定了网银限额，则限额以其个人设定的为准。</p>
<{include file="`$CONST.viewPath`itzdefault/wap/statistic.tpl"}>
</body>
</html>
