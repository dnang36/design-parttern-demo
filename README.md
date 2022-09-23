# Design Parttern bài thực hành 2

## Đề bài: Viết 1 file md trên git về các design pattern được sử dụng trong package được giao

### Thực hiện bởi: [Nguyễn Đoàn Đăng](https://github.com/dnang36)

### Download code và run code tại đường dẫn https://github.com/dnang36/design-parttern-demo

## Kiến thức nắm được:
## 1.Design parttern là gì:
- Design Patterns là một kỹ thuật trong lập trình hướng đối tượng, nó cung cấp các "mẫu thiết kế", giải pháp để giải quyết các vấn đề chung, thường gặp trong lập trình. Design Patterns giúp bạn giải quyết vấn đề một cách tối ưu nhất, cung cấp cho bạn các giải pháp trong lập trình OOP.
- Ưu điểm design partterns:
  - Design pattern giúp cho dự án của chúng ta dễ bảo trì, nâng cấp và mở rộng.
  - hạn chế được các lỗi tiềm ẩn.
  - giúp code của chúng ta sẽ dễ đọc hơn. Điều này rất có lợi khi làm việc nhóm.
- Các mẫu design parttern:
  - Creational 
  - Structural
  - Behavioral
## 2. Creational(Nhóm khởi tạo):
- Creational patterns là tập trung hướng tới cách khởi tạo một đối tượng hoặc một nhóm đối tượng liên quan.
-  Những Design pattern loại này cung cấp một giải pháp để tạo ra các object và che giấu được logic của việc tạo ra nó, thay vì tạo ra object một cách trực tiếp bằng cách sử dụng method new. Điều này giúp cho chương trình trở nên mềm dẻo hơn trong việc quyết định object nào cần được tạo ra trong những tình huống được đưa ra.
### 2.1. Simple Factory:
- Simple factory đơn giản là tao một phần tử cho client mà không xuất bất kì logic khởi tạo nào cho client
- Simple Factory Pattern được thiết kế để giải quyết vấn đề về cách tạo các thể hiện đối tượng kế thừa từ cùng một lớp trừu tượng. Nó thường được sử dụng trong một số kịch bản tạo đối tượng rất đơn giản.
- Ví dụ:
> Xét, Bạn đang xây dựng một ngôi nhà và bạn cần cửa. Bạn có thể mặc bộ đồ thợ mộc của bạn, mang một ít gỗ, keo dán, đinh và tất các các công cụ cần thiết để làm một cái cửa và bắt đầu làm nó trong ngôi nhà của bạn hoặc bạn chỉ cần gọi tới xưởng sản xuất và có được cái cửa đã được làm sẵn cho bạn để bạn không phải tìm hiểu bất cứ điều gì về việc làm cửa hay đối phó với mớ hỗn độn từ việc là cái cửa đó.
- đầu tiên tạo interface Door
````php
<?php

namespace ngdang\cretional\simpleFactory;

interface Door{

    public function getWidth():float;
    public function getHeight():float;

}
````
- tạo class wonderDoor implement Door
````php
<?php
namespace ngdang\cretional\simpleFactory;

class wonderDoor implements Door{

    protected $width;
    protected $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
}
````
- Tiếp theo là tạo class DoorFactory để thực hiện lắp ráp cánh cửa và trả về các thông số
````php
<?php
namespace ngdang\cretional\simpleFactory;

class doorFactory{
    public static function makeDoor($width,$height): Door
    {
        return new wonderDoor($width,$height);
    }
}
````
- Và sau đó có thể sử dụng như
````php
<?php

require 'vendor/autoload.php';
use ngdang\cretional\simpleFactory\doorFactory;

$door = doorFactory::makeDoor(100,200);

echo 'Width: '.$door->getWidth();
echo 'Heigth: '.$door->getHeight();
````
### 2.2. Factory method:
- Factory Method Pattern giải quyết vấn đề về cách tạo các thể hiện đối tượng kế thừa từ cùng một lớp trừu tượng và ẩn độ phức tạp của nó, đặc biệt khi hàm tạo phức tạp. Mã khách hàng không cần biết việc triển khai hàm tạo.
- khi nào nên sử dụng factory method:
  - Khi bạn có một nhóm các class tương tự nhau, và tùy vào ngữ cảnh của bài toán mà sẽ phải khởi tạo một đối tượng từ một trong số các class trên.
  -  Khi bạn cho rằng khả năng cao trong tương lai sẽ có những class tương tự nhau được tạo ra.
- Ví dụ:
> 
- trước tiên tạo interface socialNetWorkLogin
````php
<?php

namespace ngdang\cretional\factoryMethod;

interface socialNetworkLogin{
    public function login();
}
````
- tạo class facebook và google implement socialNetworkLogin
````php
<?php

namespace ngdang\cretional\factoryMethod;

class facebook implements socialNetworkLogin{

    public function login()
    {
        echo 'dang nhap bang facebook thanh cong';
        // TODO: Implement login() method.
    }
}


class google implements socialNetworkLogin{

    public function login()
    {
        echo 'dang nhap bang google thanh cong';
        // TODO: Implement login() method.
    }
}
````
- tiếp theo tạo ra một lớp mới là SocialNetwork, có một static method là driver($type). Dựa vào tham số $type, mình sẽ khởi tạo ra một đối tượng tương ứng.
````php
<?php

namespace ngdang\cretional\factoryMethod;

class socialNetwork{
    public static function driver($type)
    {
        if ($type='facebook'){
            return new facebook();
        }elseif ($type='google'){
            return new google();
        }
    }
}
````
- và sau đó ta có thể sử dụng
````php
<?php

require 'vendor/autoload.php';
use ngdang\cretional\factoryMethod\socialNetwork;
use ngdang\cretional\factoryMethod\facebook;
use ngdang\cretional\factoryMethod\google;

$type = 'facebook';
$social = socialNetwork::driver($type);
$social->login();

````
### 2.3. Abstract Factory
- Abstract Factory cung cấp một đối tượng bằng cách ẩn đi những sự phức tạp đằng sau nó, có nghĩa là chúng ta có một số lớp phức tạp nào đó mà được sử dụng theo từng ngữ cãnh cụ thể chúng có thể có một số chức năng, thuộc tính thống nhất theo một mô hình nào đó, có thể là một số lớp cấu trúc từ một lớp abstract, chúng ta sẽ kết hợp chúng lại để xử lý trong một lớp, mà ở đó mọi công việc xử lý được diễn ra và chỉ trả về những cái cần thiết, điều này giúp mô hình chặt chẽ và dễ dàng để sử dụng
- ví dụ:
-  Trước hết ta tạo interface Door và 2 class irondoor, woodendoor implement nó
````php
interface door
{
    public function get();
}

class woodenDoor implements door {

    public function get()
    {
        // TODO: Implement get() method.
        echo 'this is wooden door';
    }
}

class ironDoor implements door {

    public function get()
    {
        // TODO: Implement get() method.
        echo 'this is iron door';
    }
}
````
- Tiếp đó tạo implement doorFittingExpert và 2 class Welder,Carpenter implement nó
````php
interface doorFittingExpert
{
    public function getDes();
}

class welder implements doorFittingExpert{

    public function getDes()
    {
        // TODO: Implement getDes() method.
        echo 'im fix irondoor';
    }
}

class carpenter implements doorFittingExpert{

    public function getDes()
    {
        // TODO: Implement getDes() method.
        echo 'im fix wood door';
    }
}
````
- Bây giờ chúng ta có abstract factory cho phép chúng ta liên kết các đối tượng có liên quan tức là nhà máy sản xuất cửa gỗ sẽ tạo ra cánh cửa gỗ và chuyên gia lắp cửa gỗ, và nhà máy sản xuất cửa sắt sẽ tạo ra cánh cửa sắt và chuyên gia lắp cửa sắt
````php
interface DoorFactory
{
    public function makeDoor(): Door;
    public function makeFittingExpert(): DoorFittingExpert;
}

// Wooden factory to return carpenter and wooden door
class WoodenDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new WoodenDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();
    }
}

// Iron door factory to get iron door and the relevant fitting expert
class IronDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new IronDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welder();
    }
}
````
- sử dụng
````php
$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();  // Output: I am a wooden door
$expert->getDescription(); // Output: I can only fit wooden doors

// Same for Iron Factory
$ironFactory = new IronDoorFactory();

$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();  // Output: I am an iron door
$expert->getDescription(); // Output: I can only fit iron doors

````

### 2.4. Singleton
- Singleton design pattern là một dạng design pattern thuộc nhóm khởi tạo, nó giúp bạn với mỗi class sẽ chỉ có thể tạo ra một đối tượng.
- khi nào nên sử dụng singleton:
  - Khi bạn muốn một class sẽ chỉ tạo ra một đối tượng xuyên suốt toàn bộ dự án thì sẽ sử dụng tới Singleton design pattern
  - Khi muốn tạo một class quản lý việc kết nối tới database, hoặc các kết nối tương tự.
  -  Khi tích hợp tính năng thanh toán qua các cổng thanh toán.
  - Khi bạn muốn quản lý các thông tin cấu hình của hệ thống thông qua các class
- ví dụ:
````php
<?php
class Classname
{
    private static $instance = null;
 
    private function __construct()
    {
        //
    }
 
    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new static;
        }
         
        return static::$instance;
    }
}
 
// Cách sử dụng
$object = Classname::getInstance();
````
### 2.5. Builder
- Cho phép bạn bạn tạo các object có đặc điểm khác nhau trong khi tránh bị ảnh hưởng việc khởi tạo. Nó hữu dụng khi có thể tạo nhiều tùy chọn cho một object. Hoặc khi có quá nhiều bước trong việc tạo ra một object.
- Ví dụ thực tế
> Hãy tưởng tượng là bạn đang ở Hardee's và bạn đặt một đơn hàng , hãy nói "Big hardee" và họ đưa cho bạn mà không có bất kì câu hỏi nào; đây là một ví dụ về simple factory. Nhưng đâu là những trường hợp khi logic khởi tạo liên quan tới nhiều bước. Ví dụ như bạn muốn tùy chỉnh đơn Subway, bạn có nhiều lựa chọn trong việc chiếc burger của bjan được làm như nào như bạn đang muốn bánh mì gì? loại sốt mà bạn muốn?... Trong những trường hợp như vậy, builder pattern được sử dụng như một giải pháp.
x`
Như bạn thấy, số lượng tham số của hàm khởi tạo có thể nhanh chóng làm bạn mất kiểm soát và nó dần trở nên rất khó hiểu về sự sắp xếp các tham số. Thêm nữa là danh sách những tham số có thể tiếp tục phát triển nếu bạn muốn thêm nhiều option trong tương lai. Điều này được gọi là mô hình chống constructor.

**Ví dụ**

Cách thay thế hợp lý là sử dụng builder pattern. Trước chúng ta có buger cái chúng ta muốn làm.

```php
class Burger
{
    protected $size;

    protected $cheese = false;
    protected $pepperoni = false;
    protected $lettuce = false;
    protected $tomato = false;

    public function __construct(BurgerBuilder $builder)
    {
        $this->size = $builder->size;
        $this->cheese = $builder->cheese;
        $this->pepperoni = $builder->pepperoni;
        $this->lettuce = $builder->lettuce;
        $this->tomato = $builder->tomato;
    }
}
```

Và chúng ta có một builder

```php
class BurgerBuilder
{
    public $size;

    public $cheese = false;
    public $pepperoni = false;
    public $lettuce = false;
    public $tomato = false;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function addPepperoni()
    {
        $this->pepperoni = true;
        return $this;
    }

    public function addLettuce()
    {
        $this->lettuce = true;
        return $this;
    }

    public function addCheese()
    {
        $this->cheese = true;
        return $this;
    }

    public function addTomato()
    {
        $this->tomato = true;
        return $this;
    }

    public function build(): Burger
    {
        return new Burger($this);
    }
}
```
Và sau đó có thể sử dụng như sau:
```php
$burger = (new BurgerBuilder(14))
                    ->addPepperoni()
                    ->addLettuce()
                    ->addTomato()
                    ->build();
```

**Khi nào sử dụng**

Khi có thể có một số đặc điểm của object và tránh việc chống lại khởi tạo. Sự khác biệt chính của factory pattern là đây; factory pattern được sử dụng khi việc khởi tạo chỉ có một bước trong tiến trình trong khi builder pattern được sử dụng khi có nhiều bước trong quá trình.

## 3. Structural(Nhóm cấu trúc):
- Nhóm này tập trung các pattern giải quyết các vấn đề liên quan tới cách tổ chức các lớp, đối tượng sao cho linh hoạt, ngăn nắp để dễ dàng thay đổi, hay mở rộng code sau này.
- Những Design pattern loại này liên quan tới class và các thành phần của object.Nó dùng để thiết lập, định nghĩa quan hệ giữa các đối tượng.

### 3.1. Facade:
- Khái niêm: Facade Pattern là một trong các pattern quan trọng nhất và hay nhất trong thiết kế phần mềm, thuộc nhóm structural pattern. Nó đóng vai trò che dấu đi tất cả những sự phức tạp, sự lằng nhằng của một chức năng nào đó trong hệ thống và cung cấp một giao diện, một class với một cách thức sử dụng đơn giản và hiệu quả hơn rất nhiều.
- ví dụ:
>  Làm thế nào bạn mở được máy tính ? Bạn nói "Nhấn nút nguồn" Đó là điều bạn tin bởi vì bạn đang sử dụng một interface đơn giản mà máy tính cung cấp ở bên ngoài, bên trong nó phải làm rất nhiều thứ để làm cho nó xảy ra. Interface đơn giản này với hệ thống con phức tạp là một facade.

- Ở đây chúng ta có class Computer
````php
class Computer
{
    public function getElectricShock()
    {
        echo "Ouch!";
    }

    public function makeSound()
    {
        echo "Beep beep!";
    }

    public function showLoadingScreen()
    {
        echo "Loading..";
    }

    public function bam()
    {
        echo "Ready to be used!";
    }

    public function closeEverything()
    {
        echo "Bup bup bup buzzzz!";
    }

    public function sooth()
    {
        echo "Zzzzz";
    }

    public function pullCurrent()
    {
        echo "Haaah!";
    }
}
````
- tạo lớp computerFacade
````php
class ComputerFacade
{
    protected $computer;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    public function turnOn()
    {
        $this->computer->getElectricShock();
        $this->computer->makeSound();
        $this->computer->showLoadingScreen();
        $this->computer->bam();
    }

    public function turnOff()
    {
        $this->computer->closeEverything();
        $this->computer->pullCurrent();
        $this->computer->sooth();
    }
}
````
- sử dụng:
````php
$computer = new ComputerFacade(new Computer());
$computer->turnOn(); // Ouch! Beep beep! Loading.. Ready to be used!
$computer->turnOff(); // Bup bup buzzz! Haah! Zzzzz
````
## 4. Behavior(Nhóm hành vi):
- Nhóm này tập trung các pattern giải quyết các vấn đề liên quan tới hành vi, sự phân công trách nhiệm giữa các đối tượng.
- Nhóm này dùng trong thực hiện các hành vi của đối tượng, sự giao tiếp giữa các object với nhau.

### 4.1. Observer
- Là một mẫu thiết kế dành cho việc một đối tượng khi thay đổi trạng thái của bản thân nó thì các đối tượng đính kèm theo cũng sẽ được thông báo. 
- ví dụ:
````php
<?php
interface IObserver
{
  function onChanged( $sender, $args );
}

interface IObservable
{
  function addObserver( $observer );
}

class UserList implements IObservable
{
  private $_observers = array();

  public function addCustomer( $name )
  {
    foreach( $this->_observers as $obs )
      $obs->onChanged( $this, $name );
  }

  public function addObserver( $observer )
  {
    $this->_observers []= $observer;
  }
}

class UserListLogger implements IObserver
{
  public function onChanged( $sender, $args )
  {
    echo( "'$args' added to user list\n" );
  }
}

$ul = new UserList();
$ul->addObserver( new UserListLogger() );
$ul->addCustomer( "Jack" );
?>
````