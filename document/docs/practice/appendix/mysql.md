# MySQL

## テクニック

簡単に SQL を実行させる方法を紹介します。

`/var/www/html`に`insert_data.sql`と`create_table.sql`を作成してください。

```sql title="create_table.sql"
DROP TABLE IF EXISTS product;
CREATE TABLE product (name varchar(255), price int);
```

```sql title="insert_data.sql"
INSERT INTO product(name, price) VALUES ('apple', 100);
INSERT INTO product(name, price) VALUES ('pen', 200);
INSERT INTO product(name, price) VALUES ('pineapple', 500);
```

作成後、以下のコマンドを実行してください。

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ mysql -uroot -pqaz123WSX$ -h localhost webapp < create_table.sql
mysql: [Warning] Using a password on the command line interface can be insecure.
ubuntu@ip-172-31-85-199:/var/www/html$ mysql -uroot -pqaz123WSX$ -h localhost webapp < insert_data.sql
mysql: [Warning] Using a password on the command line interface can be insecure.
```

このようにすることで、`mysql`に入ることなく、SQL を実行することができます。
