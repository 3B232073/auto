<?php
    require '../vendor/autoload.php';
    
    //類別先載入進來
    use Demo\Hello\Lara;
    use Demo\Hello\Someone;
	use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
	use Carbon\Carbon;

    $lara = new Lara();
    $vincent = new Someone('Vincent');
    
    //類別未先載入進來
    $mary = new Demo\Hello\Someone('Mary');
    $john = new Demo\Hello\Someone('John');
    $hello = new Demo\HelloWorld();

    //類別另取別名
    use Demo\HelloWorld as World ;
    $world = new World();
	
	//log name 改為WISD
	$log = new Logger('WISD');
	$log->pushHandler(new StreamHandler(__DIR__ . '/../log/my.log', Logger::DEBUG));
	$log->info("Monolog 測試成功！");
	
	// === Carbon 測試開始 ===
	
	// 1. 目前時間
	$log->info("現在時間：" . Carbon::now());

	// 2. 今天日期
	$log->info("今天是：" . Carbon::today());

	// 3. 昨天
	$log->info("昨天是：" . Carbon::yesterday());

	// 4. 明天
	$log->info("明天是：" . Carbon::tomorrow());

	// 5. +7 天
	$log->info("七天後：" . Carbon::now()->addDays(7));

	// 6. -3 天
	$log->info("三天前：" . Carbon::now()->subDays(3));

	// 7. 下週一
	$log->info("下週一：" . Carbon::now()->next('Monday'));

	// 8. 當前年份
	$log->info("今年：" . Carbon::now()->year);

	// 9. 當前月份
	$log->info("這個月：" . Carbon::now()->month);

	// 10. 格式化日期
	$log->info("格式化：" . Carbon::now()->format('Y-m-d H:i:s'));

?>