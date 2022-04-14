**Select monotable sur champ**
- db: innodb-large
- command: siege -c10 -t20s http://127.0.0.1/martin/siege
- query: SELECT name from category_

Transactions:                    372 hits
Availability:                 100.00 %
Elapsed time:                  19.30 secs
Data transferred:               4.40 MB
Response time:                  0.01 secs
Transaction rate:              19.28 trans/sec
Throughput:                     0.23 MB/sec
Concurrency:                    0.13
Successful transactions:         378
Failed transactions:               0
Longest transaction:            0.03
Shortest transaction:           0.00


- db: innodb-large-index
- command: siege -c10 -t20s http://127.0.0.1/martin/siege
- query: SELECT name from category_

Transactions:                    368 hits
Availability:                 100.00 %
Elapsed time:                  19.98 secs
Data transferred:              14.43 MB
Response time:                  0.01 secs
Transaction rate:              18.42 trans/sec
Throughput:                     0.72 MB/sec
Concurrency:                    0.13
Successful transactions:         375
Failed transactions:               0
Longest transaction:            0.03
Shortest transaction:           0.00



**Join sur champ**
- db: innodb-large
- command: siege -c10 -t20s http://127.0.0.1/martin/siege
- query: SELECT firstname from category_ INNER JOIN user_ ON category_.id = user_.idCategory

Transactions:                    366 hits
Availability:                 100.00 %
Elapsed time:                  19.40 secs
Data transferred:             100.48 MB
Response time:                  0.02 secs
Transaction rate:              18.86 trans/sec
Throughput:                     5.18 MB/sec
Concurrency:                    0.44
Successful transactions:         372
Failed transactions:               0
Longest transaction:            0.14
Shortest transaction:           0.00


- db: innodb-large-index
- command: siege -c10 -t20s http://127.0.0.1/martin/siege
- query: SELECT firstname from category_ INNER JOIN user_ ON category_.id = user_.idCategory

Transactions:                    368 hits
Availability:                 100.00 %
Elapsed time:                  19.61 secs
Data transferred:             101.03 MB
Response time:                  0.02 secs
Transaction rate:              18.76 trans/sec
Throughput:                     5.15 MB/sec
Concurrency:                    0.42
Successful transactions:         374
Failed transactions:               0
Longest transaction:            0.20
Shortest transaction:           0.00



**Select avec fonction (LCASE(name) par exemple)**
- db: innodb-large
- command: siege -c10 -t20s http://127.0.0.1/martin/siege
- query: SELECT LCASE(firstname) from user_

Transactions:                    320 hits
Availability:                 100.00 %
Elapsed time:                  19.05 secs
Data transferred:              98.53 MB
Response time:                  0.03 secs
Transaction rate:              16.80 trans/sec
Throughput:                     5.17 MB/sec
Concurrency:                    0.44
Successful transactions:         327
Failed transactions:               0
Longest transaction:            0.19
Shortest transaction:           0.00


- db: innodb-large-index
- command: siege -c10 -t20s http://127.0.0.1/martin/siege
- query: SELECT LCASE(firstname) from user_

Transactions:                    354 hits
Availability:                 100.00 %
Elapsed time:                  19.75 secs
Data transferred:             109.00 MB
Response time:                  0.02 secs
Transaction rate:              17.92 trans/sec
Throughput:                     5.52 MB/sec
Concurrency:                    0.37
Successful transactions:         360
Failed transactions:               0
Longest transaction:            0.15
Shortest transaction:           0.00



**Utilisation de fonction de regroupement**
- db: innodb-large
- command: siege -c10 -t20s http://127.0.0.1/martin/siege
- query: SELECT firstname from user_ GROUP BY 



**Test perso sur le firstname en mode BOMBARDEMENT**
- db: innodb-large
- command: siege -b -t30s http://127.0.0.1/martin/siege
- query: SELECT firstname from user_ where firstname = "Ramona"

Transactions:                  71716 hits
Availability:                 100.00 %
Elapsed time:                  29.88 secs
Data transferred:             209.88 MB
Response time:                  0.00 secs
Transaction rate:            2400.46 trans/sec
Throughput:                     7.02 MB/sec
Concurrency:                    8.22
Successful transactions:       71730
Failed transactions:               0
Longest transaction:            0.03
Shortest transaction:           0.00


- db: innodb-large-index
- command: siege -b -t30s http://127.0.0.1/martin/siege
- query: SELECT firstname from user_ where firstname = "Ramona"

Transactions:                 108426 hits
Availability:                 100.00 %
Elapsed time:                  29.71 secs
Data transferred:             317.34 MB
Response time:                  0.00 secs
Transaction rate:            3649.36 trans/sec
Throughput:                    10.68 MB/sec
Concurrency:                    5.73
Successful transactions:      108447
Failed transactions:               0
Longest transaction:            0.03
Shortest transaction:           0.00
