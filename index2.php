<?php
// Dogクラスの定義
class Dog
{
	// プロパティ（属性）
	public $name;
	public $breed;

	// コンストラクタ（インスタンス生成時に呼ばれる）
	public function __construct($name, $breed)
	{
		$this->name = $name;  // $this->nameはインスタンスのプロパティを指す
		$this->breed = $breed;
	}

	// メソッド（動作）
	public function getInfo()
	{
		return "This dog's name is " . $this->name . " and its breed is " . $this->breed . ".";
	}
}

// Dogクラスのインスタンスを生成
$myDog = new Dog("Buddy", "Golden Retriever");

// インスタンスのメソッドを呼び出し、情報を表示
echo $myDog->getInfo();
