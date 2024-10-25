<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>PHPとHTMLの組み合わせ</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

	<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
		<h1 class="text-2xl font-bold text-center mb-6">
			<?php echo "PHPで生成されたタイトル"; ?>
		</h1>

		<p class="text-gray-700 mb-6">現在の日時は: <span class="font-mono"><?php echo date("Y-m-d H:i:s"); ?></span></p>

		<form method="post" action="index1.php" class="mb-6">
			<div class="mb-4">
				<label for="message" class="block text-sm font-medium text-gray-700 mb-2">入力してください:</label>
				<input type="text" id="message" name="message" class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="メッセージを入力">
			</div>
			<button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition">送信</button>
		</form>

		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// データベース接続の設定
			$servername = "localhost";
			$username = "root";
			$password = "gyarmex";
			$database = "php_sample";
			$message = $_POST['message'];
			$conn = new mysqli($servername, $username, $password, $database);
			if ($conn->connect_error) {
				die("接続失敗: " . $conn->connect_error);
			}
			echo "<p class='text-green-500 mb-4'>データベースに接続成功</p>";
			$message = $conn->real_escape_string($message);
			$sql = "INSERT INTO todo (contents) VALUES ('$message')";
			if ($conn->query($sql) === TRUE) {
				echo "<p class='text-green-500 mb-4'>新しいレコードが作成されました</p>";
			} else {
				echo "<p class='text-red-500 mb-4'>エラー: " . $sql . "<br>" . $conn->error . "</p>";
			}
			// データの取得と表示
			$sql = "SELECT contents FROM todo";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table class='w-full border-collapse mb-6'>
						<thead>
							<tr class='bg-gray-200'>
								<th class='border px-4 py-2'>内容</th>
								<th class='border px-4 py-2'>操作</th>
							</tr>
						</thead>
						<tbody>";
				while ($row = $result->fetch_assoc()) {
					echo "<tr>
							<td class='border px-4 py-2'>" . $row["contents"] . "</td>
							<td class='border px-4 py-2'>
								<form method='post' action=''>
									<button type='submit' name='deleteButton' class='bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition'>削除</button>
								</form>
							</td>
						  </tr>";
				}
				echo "</tbody></table>";
			}
			$conn->close();
		}
		?>

		<?php
		// クラスとその情報の表示
		class Dog
		{
			public $name;
			public $breed;
			public function __construct($name, $breed)
			{
				$this->name = $name;
				$this->breed = $breed;
			}
			public function getInfo()
			{
				return "This dog's name is " . $this->name . " and its breed is " . $this->breed . ".";
			}
		}

		$myDog = new Dog("Buddy", "Golden Retriever");
		echo "<p class='text-gray-700 mt-4'>" . $myDog->getInfo() . "</p>";
		?>

	</div>
</body>

</html>