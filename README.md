# routerdump
a router dump with collection info
> [@Suroy](https://suroy.cn) ｜ 2022.2.21

## 目录结构
|____LICENSE
|____router-info.sh # 核心运行文件
|____web # api接口
| |____app.php
| |____.DS_Store
| |____app.php.bak
| |____app-router.php.bak
| |____app-router.php
| |____data
| | |____demo.txt
| | |____1.txt
| | |____.htaccess
|____README.md

## 定时任务
使用 crontab 设置定时任务
`0 20 * * * /tmp/router.sh`

## 使用说明
1. 克隆仓库
2. 配置 router-info.sh 提交地址及id号(走路由时需要及时更换API)
3. 设置定时任务

## 已知BUG
.[] 待修复路由模式下数据上传400错误
