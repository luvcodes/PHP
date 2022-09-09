## PHP语言与数据库的交互相关知识

### 基础知识点

#### 初次连接mysql数据库
 - 1. 首先要在phpmyadmin中创建好user account和数据库名称
 - 2. 使用sql代码来将具体的属性导入到数据库中，并且可以插入数据
 - 3. 本地连接数据库。

 - pdo的意思：PHP Data Object
   - PDO本身可以用作访问数据库中的table和data的方法，用PDO来access它们。
   - 当new PDO的时候就正在创建一个constructor，因为PDO本身就正在创建对象，所以可以理解成这就是一个构造器。
   - 此构造器需要3个
 - dsn的意思：data source name
    > dsn可以用来承接数据库的hostname和数据库名，类似这样： 
   > $dsn = "mysql:host=$Host;dbname=$DB";
 - dbh的意思：database handle
    > dbh的功能主要是an endpoint for operations
 - prepare方法的功能：
    > check validity of SQL query, prevents SQL injection.
 - fetch和fetchObject方法的功能：
    > fetch() returns an associative and numerical array representing a database row. 
   > fetchObject() and use object notation
 - closeCursor()方法的作用：
   > Free up the resources using closeCursor

