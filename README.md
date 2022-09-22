# Design Parttern bài thực hành 2

## Đề bài: Viết 1 file md trên git về các design pattern được sử dụng trong package được giao

### Thực hiện bởi: [Nguyễn Đoàn Đăng](https://github.com/dnang36)

### Download code và run code tại đường dẫn https://github.com/dnang36/design-parttern-demo

## Kiến thức nắm được:
## 1.Design parttern là gì:
- Design patterns là những giải pháp cho những vấn đề thường gập phải; Hướng dẫn giải quyết những vấn đề nhất định. Nó không phải là những class, package or hay những thư viện mà bạn có thể thêm vào ứng dụng của bạn và chờ đợi điều kì diệu xảy ra. Đây là những hướng dẫn về cách giải quyết các vấn đề nhất định trong những tình huống nhất định.
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

### 2.1. Simple Factory:
- Simple factory đơn giản là tao một phần tử cho client mà không xuất bất kì logic khởi tạo nào cho client
- Simple Factory Pattern được thiết kế để giải quyết vấn đề về cách tạo các thể hiện đối tượng kế thừa từ cùng một lớp trừu tượng. Nó thường được sử dụng trong một số kịch bản tạo đối tượng rất đơn giản.
- 
### 2.2. Factory method:
- Factory Method Pattern giải quyết vấn đề về cách tạo các thể hiện đối tượng kế thừa từ cùng một lớp trừu tượng và ẩn độ phức tạp của nó, đặc biệt khi hàm tạo phức tạp. Mã khách hàng không cần biết việc triển khai hàm tạo.
- khi nào nên sử dụng factory method:
  - Khi bạn có một nhóm các class tương tự nhau, và tùy vào ngữ cảnh của bài toán mà sẽ phải khởi tạo một đối tượng từ một trong số các class trên.
  -  Khi bạn cho rằng khả năng cao trong tương lai sẽ có những class tương tự nhau được tạo ra.
### 2.3. Abstract Factory
- Abstract Factory cung cấp một đối tượng bằng cách ẩn đi những sự phức tạp đằng sau nó, có nghĩa là chúng ta có một số lớp phức tạp nào đó mà được sử dụng theo từng ngữ cãnh cụ thể chúng có thể có một số chức năng, thuộc tính thống nhất theo một mô hình nào đó, có thể là một số lớp cấu trúc từ một lớp abstract, chúng ta sẽ kết hợp chúng lại để xử lý trong một lớp, mà ở đó mọi công việc xử lý được diễn ra và chỉ trả về những cái cần thiết, điều này giúp mô hình chặt chẽ và dễ dàng để sử dụng
- 
### 2.4. Singleton
- Singleton design pattern là một dạng design pattern thuộc nhóm khởi tạo, nó giúp bạn với mỗi class sẽ chỉ có thể tạo ra một đối tượng.
- khi nào nên sử dụng singleton:
  - Khi bạn muốn một class sẽ chỉ tạo ra một đối tượng xuyên suốt toàn bộ dự án thì sẽ sử dụng tới Singleton design pattern
  - Khi muốn tạo một class quản lý việc kết nối tới database, hoặc các kết nối tương tự.
  -  Khi tích hợp tính năng thanh toán qua các cổng thanh toán.
  - Khi bạn muốn quản lý các thông tin cấu hình của hệ thống thông qua các class
### 2.5. Builder


## 3. Structural(Nhóm cấu trúc):
- Nhóm này tập trung các pattern giải quyết các vấn đề liên quan tới cách tổ chức các lớp, đối tượng sao cho linh hoạt, ngăn nắp để dễ dàng thay đổi, hay mở rộng code sau này.
### 3.1. Facade:
- Khái niêm: Facade Pattern là một trong các pattern quan trọng nhất và hay nhất trong thiết kế phần mềm, thuộc nhóm structural pattern. Nó đóng vai trò che dấu đi tất cả những sự phức tạp, sự lằng nhằng của một chức năng nào đó trong hệ thống và cung cấp một giao diện, một class với một cách thức sử dụng đơn giản và hiệu quả hơn rất nhiều.

## 4. Behavior(Nhóm hành vi):
- Nhóm này tập trung các pattern giải quyết các vấn đề liên quan tới hành vi, sự phân công trách nhiệm giữa các đối tượng.
### 4.1. Observer
- Là một mẫu thiết kế dành cho việc một đối tượng khi thay đổi trạng thái của bản thân nó thì các đối tượng đính kèm theo cũng sẽ được thông báo. 