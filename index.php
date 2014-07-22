<?php 
//from server.php
header("Content-Type:text/html; charset=utf-8");

//自定傳給歐付寶的值
//$MerchantID        = '1034405';      //鑽贏商店代號 (固定值) ●正式
$MerchantID        = '2000132';      //鑽贏商店代號 (固定值) ●測試
//$MerchantTradeNo   = 'jowin0000000001';  //廠商交易編號 (20位元)
$MerchantTradeDate = date("Y/m/d H:i:s");  //廠商交易時間 (20位元)
$MerchantTradeNo   = 'jowin'.strtotime($MerchantTradeDate);  //廠商交易編號 (20位元) ●因為不能重複，所以加上時間戳記
$PaymentType       = 'aio';      //交易類型 (固定值)
$TotalAmount       = '30000';      //交易金額 (●不可為空)
$TradeDesc         = '鑽贏雲端購物'; //交易描述 (200位元)
$ItemName          = '測試商品';   //商品名稱 (200位元)
$ReturnURL       = 'http://www.jowinwin.com/client.php';  //付款完成通知回傳網址
$ChoosePayment     = 'Credit';       //付款方式 (信用卡、網路ATM、ATM、CVS超商代碼、BARCODE超商條碼、Alipay支付寶)



$ClientBackURL     = ''; //Client端回傳網址 (200位元, 可為空)
$ItemURL       = ''; //商品銷售網址 (200位元, 可為空)
$Remark        = ''; //備註欄位 (100位元, 可為空)
$ChooseSubPayment  = ''; //選擇預設付款子項目 (可為空)
$OrderResultURL    = ''; //Client回傳付款網址 (可為空)
$NeedExtraPaidInfo = ''; //是否需要額外的付款資訊 (可為空)
$DeviceSource      = ''; //裝置來源 (可為空)

//信用卡支付專用
//////////////////////////////////////////////////////////////////
$CreditInstallment = '0'; //刷卡分期期數 (0=不使用分期)
$InstallmentAmount = '0'; //刷卡分期的付款金額 (0=不使用分期)
$Redeem        = '';  //信用卡是否使用紅利折抵 (可為空)
//////////////////////////////////////////////////////////////////


//from check.php
$HashKey = '5294y06JbISpM5x9';     //鑽贏HashKey (固定值) ●測試
$HashIV  = 'v77hoKGq4kWxNNIS';     //鑽贏HashIV (固定值) ●測試


$HashText = 'HashKey='. $HashKey .'&ChoosePayment='. $ChoosePayment .'&ItemName='. $ItemName .'&MerchantID='. $MerchantID .'&MerchantTradeDate='. $MerchantTradeDate .'&MerchantTradeNo='. $MerchantTradeNo .'&PaymentType='. $PaymentType .'&ReturnURL='. $ReturnURL .'&TotalAmount='. $TotalAmount .'&TradeDesc='. $TradeDesc .'&HashIV='. $HashIV;
// var_dump($HashText);
//檢查碼規則 (將所有字串做URL Encode再轉成小寫再做MD5加密)
$CheckMacValue     = md5(strtolower(urlencode($HashText))); //檢查碼產生 (●不可為空)



?>

<form name='pay' method='post' action='http://payment-stage.allpay.com.tw/Cashier/AioCheckOut'>

<input type='hidden' name='ChoosePayment' Value="<?php echo $ChoosePayment; ?>">
<input type='hidden' name='ItemName' Value="<?php echo $ItemName; ?>">
<input type='hidden' name='MerchantID' Value="<?php echo $MerchantID; ?>">
<input type='hidden' name='MerchantTradeDate' Value="<?php echo $MerchantTradeDate; ?>">
<input type='hidden' name='MerchantTradeNo' Value="<?php echo $MerchantTradeNo; ?>">
<input type='hidden' name='PaymentType' Value="<?php echo $PaymentType; ?>">
<input type='hidden' name='ReturnURL' Value="<?php echo $ReturnURL; ?>">
<input type='hidden' name='TotalAmount' Value="<?php echo $TotalAmount; ?>">
<input type='hidden' name='TradeDesc' Value="<?php echo $TradeDesc; ?>">



<!-- <input type='hidden' name='HashKey' Value="<?php echo $HashKey; ?>"> -->
<!--  <input type='hidden' name='HashIV' Value="<?php echo $HashIV; ?>">-->
<!--
<input type='hidden' name='CheckMacValue' Value="<?php echo $CheckMacValue; ?>">
<input type='hidden' name='ClientBackURL' Value="<?php echo $ClientBackURL; ?>">
<input type='hidden' name='ItemURL' Value="<?php echo $ItemURL; ?>">
<input type='hidden' name='Remark' Value="<?php echo $Remark; ?>">
<input type='hidden' name='ChooseSubPayment' Value="<?php echo $ChooseSubPayment; ?>">
<input type='hidden' name='OrderResultURL' Value="<?php echo $OrderResultURL; ?>">
<input type='hidden' name='NeedExtraPaidInfo' Value="<?php echo $NeedExtraPaidInfo; ?>">
<input type='hidden' name='DeviceSource' Value="<?php echo $DeviceSource; ?>">
<input type='hidden' name='CreditInstallment' Value="<?php echo $CreditInstallment; ?>">
<input type='hidden' name='InstallmentAmount' Value="<?php echo $InstallmentAmount; ?>">
<input type='hidden' name='Redeem' Value="<?php echo $Redeem; ?>">-->


<input type='hidden' name='CheckMacValue' Value="<?php echo $CheckMacValue; ?>">
<input type='submit' value='確認送出'>

