# 簡單的 PHP CRUD 實作

## 說明

1. 此版本為新手簡易入門版本，使用最少的知識量來達成 CRUD 操作。
2. 暫未考量資訊安全
3. 暫未考量 UI/UX 設計

## 筆記

1. mysqli_fetch_assoc 一次只會輸出一行，因此需要使用 while 儲存陣列，而不能直接使用 foreach。
2. insert checkbox , from name 要使用陣列命名, ex. data[] , 可以使用 implode 將陣列轉字串存入資料庫

## 出處

PHP CRUD series using MySQL Database for beginners | khaiserkhanam
