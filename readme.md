## 时间轴管理照片展示平台 —— 记忆画廊

基于PHP－Laravel开发的照片展示平台，可以展示你和TA的专属记忆，分享你和TA们曾经的幸福时光。

## 功能介绍

 - 前台时间轴动态效果展示
 - 后台时间图片管理
 - 后台配置前台展示效果
 - 主题设置个性定制
 - 站点访问权限管理
 - 后台密钥管理

## 环境需求

 - PHP 版本 >= 5.4
 - Mcrypt PHP 扩展
 - OpenSSL PHP 扩展
 - Mbstring PHP 扩展
 - Tokenizer PHP 扩展
 - GD PHP 扩展
 - Composer

## 安装流程

  1. 下载源代码
`git clone https://github.com/cqcre/GermyGallery.git`
  2. 安装好composer之后
  `composer update`
  3. 改变文件夹权限
  `chomd -R 777 storage public`
  4. 创建 .env 文件
  `sudo mv .env.example .env`
  5. 新建数据库，修改 .env 配置信息
  6. 数据表创建和数据填充
  `php artisan migrate`
  `composer dump-autoload`
  `php artisan db:seed`
  7. 站点解析至 /public 目录

## 代码引用

[helloweba](http://www.helloweba.com/)
[H+](http://www.zi-han.net/)