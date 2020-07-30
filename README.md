# Material_Blog

## Table of Contents 目录

- [Introduction 简介](#introduction-简介)
- [Demo 演示](#demo-演示)
- [Badge 徽章](#badge-徽章)
- [Install 安装方法](#install-安装方法)
- [Usage 使用方法](#usage-使用方法)
- [Finished 已实现功能](#finished-已实现功能)
- [Todo 待实现功能](#todo-待实现功能)
- [Changelog 更新日志](#changelog-更新日志)
- [Maintainers 维护者](#maintainers-维护者)
- [Contributing 贡献](#contributing-贡献)
- [Contributors 贡献者](#contributors-贡献者)
- [License 许可证](#license-许可证)

## Introduction 简介

Elegant, pure and simple.

优雅，纯粹，而又简约。

A Material-Design blog built with PHP and MySQL databases, and it is rendered by [MDUI](https://www.mdui.org/).

一个基于 PHP 及 MySQL 搭建而成的 Material-Design 设计风博客，并采用 [MDUI](https://www.mdui.org/) 组件进行渲染。

Basic features are implemented, which means that you are able to post article, finish administration and so on. 

虽称不上应有尽有，但基本的功能经已实现，如进行文章浏览与发布、后台管理等功能。

Please feel free to enjoy the blog.

无问西东，尽情使用。

## Demo 演示

- Index 首页
![localhost_blog_index.png](https://i.loli.net/2020/07/29/Sze3gyJ7kxsAwrO.png)

- Article in details 文章详情
![localhost_blog_articledetails.png](https://i.loli.net/2020/07/29/AR7MF5Tf6qSutmr.png)

- Search 文章检索
![localhost_blog_selectarticle.png](https://i.loli.net/2020/07/29/3bukKf4wjJEZt8h.png)

- User center 用户中心
![localhost_blog_user.png](https://i.loli.net/2020/07/29/Qz1FYE2dwmU3B7O.png)

- Admin center 管理中心
![localhost_blog_admin.png](https://i.loli.net/2020/07/29/uRx2573oEz8k1ti.png)

- Check articles 文章列表
![localhost_blog_checkarticle.png](https://i.loli.net/2020/07/29/sEI7j8rlRcFCkxm.png)

## Badge 徽章

Here are some badges for fun! Travis-Ci is on always-pass status, because it is unnecessary in this time.

一些好玩的徽章，仅供娱乐！ 因暂未需要进行大规模的持续协作及集成，Travis-Ci 设定为常通过状态。

![GitHub last commit](https://img.shields.io/github/last-commit/Kitcham/Material_Blog)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/Kitcham/Material_Blog)
![GitHub release (latest by date)](https://img.shields.io/github/v/release/Kitcham/Material_Blog?color=vdfzv)
![GitHub CopyRight](https://img.shields.io/badge/Power%20By-Kitcham-orange)

## Install 安装方法

### Branch infomation 分支介绍

The project includes master and canary branch, please choose which you want.

项目包含 master 及 canary 两个分支，可根据你的需要及喜好选择使用。

#### [Download master version 下载 master 版本](https://github.com/Kitcham/Material_Blog)

> Should be the most stable. Recommended for most users.  
> 最稳定的版本，适合绝大多数用户。

#### [Download canary version 下载 canary 版本](https://github.com/Kitcham/Material_Blog/tree/canary)

> Maybe unstable, but includes latest features. Recommended for advanced users and developers.  
> 包含最新的、尚在开发中的特性，但可能不稳定，适合进阶用户及开发者。

### Use git to install 使用 git 安装

```bash
git clone https://github.com/Kitcham/Material_Blog.git Material_Blog
cd Material_Blog
git checkout {branch/tags name}
```

## Usage 使用方法
1. Finish install step above. 完成上述安装步骤。
2. Import `material_blog.sql` in `mysqlDump` or create MySQL database according to `material_blog.sql`. 导入 `mysqlDump` 目录下的 `material_blog.sql` 文件或依照表结构新建 MySQL 数据库及数据表。
3. Set your MySQL configuration and database name in the `dbconfig.php`. 在 `dbconfig.php` 文件中配置好你的 MySQL 数据库信息。
4. You can login as admin with `username: admin` and `password: admin`. 你可以使用默认的管理员账户登录（ `用户名：admin`，`密码：admin`）。 
5. Enjoy yourself. 开始网上冲浪吧。

## Finished 已实现功能

- Articles card flow with lively visual language 视觉化语言的文章瀑布流
- View articles in details 阅读文章详情
- Regist and login 注册及登录
- User center 用户中心
- Change avatar by upload or Gravatar 自定义上传头像或使用 Gravatar 头像
- Check user list and configure authority **(Only admin user can access)**  查看用户列表及修改权限 **(仅管理员账户可用)**
- Post articles **(Only admin user can access)**  发表文章 **(仅管理员账户可用)**

## Todo 待实现功能

- [x] Add PHP staticize generation(add at next version) 增加 PHP 静态化生成器（于下一版本发布）
- [ ] Add Markdown Editor Markdown 增加 Markdwon 编辑器
- [ ] Add MDUI color configuration 增加 MDUI 主题切换

## Change Log 更新日志

Please read [change log](https://github.com/Kitcham/Material_Blog/wiki/Change-log) here.

请点击查看[更新日志](https://github.com/Kitcham/Material_Blog/wiki/Change-log)。

## Maintainers 维护者

[@Kitcham](https://github.com/Kitcham).

## Contributing 贡献

All kinds of contributions (enhancements, new features, documentation & code improvements, issues & bugs reporting) are welcome.

欢迎各种形式的贡献，包括但不限于优化，添加功能，文档及代码的改进，问题和 bugs 的报告。

Before you start your contributing, please read the Contributing Rules Wiki first.

在参与贡献之前，请阅读项目贡献 Wiki，了解如何为 Material_Blog 贡献。

## Contributors 贡献者

<a href="https://github.com/Kitcham"><img style="width:80px; height:80px; border-radius:50%;margin:10px;" src="https://cn.gravatar.com/avatar/9b747627b8927f7f76540bf988f5ce26?&s=200"></a>

## License 许可证

![GitHub](https://img.shields.io/github/license/Kitcham/Material_Blog?color=9cf)

Open sourced under the GPL v3.0 license.

根据 GPL V3.0 许可证开源。

---
Updating...
