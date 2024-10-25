<?php
$sample = "Hello";
$englishScore = 100;
$sum = $englishScore * 3;

if ($sum >= 100) {
	echo $sum . "<br>" . delete(100, 50);
}



# todoリストを作ってみたい

function delete($sample1, $sample2)
{
	$result = $sample1 + $sample2;
	return $result;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// テキストボックスに入力されたPHPコードを取得
	$phpCode = $_POST['phpcode'];

	// 安全のため、コードをエスケープして表示
	echo "<h2>入力されたPHPコード:</h2>";
	echo "<pre>" . htmlspecialchars($phpCode) . "</pre>";

	// eval() を使ってPHPコードを実行することも可能ですが、非常に危険です。
	// そのため、evalの使用は避けるか、慎重に行う必要があります。
	// eval($phpCode);
}
