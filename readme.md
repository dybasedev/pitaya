# Pitaya

`Pitaya（火龙果）` 电商平台项目，是一个基于 Laravel + Vue.js 构建的电商基础架构模型，用于快速承接电子商务类型的项目开发和维护。该项目计划实现一系列的底层构件用于组装成一套完整的平台体系。基于成熟的框架，该平台通过强大的包管理工具融合各类三方组件，同时提供一个良好的外部接口清单和实现，以保证该平台的可扩展性，同时在未来产品线变得更加丰富时，能够提供快速接入和被接入的能力。

## 项目主要层次结构

为保证项目的可维护性，我们将整个项目划分为三个层次：

1. 组织架构层
2. 通讯层
3. 人机交互层

`组织架构层` 用于 **提供整个平台基本运作的组件** ，并开放大量的调度接口。`通讯层` 是用于建立组织架构层和人机交互层的联系的。`人机交互层` 则是 **直接面向用户，提供人机交互界面上的可视化组件以及功能** 。

后端开发的主要工作集中在 **组织架构层**，前端则是 **人机交互层**。前后端在开发时都需要十分重视组件的通用性和轻量化。

## 开发部署说明

- PHP >= 5.6.4
- PHP OpenSSL Extension
- PHP PDO Extension
- PHP MbString Extension
- PHP Tokenizer Extension
- Composer
- NodeJS >= 4.5
- NPM

> 建议开发环境中安装 VirtualBox 和 Vagrant，通过 Laravel 的 Homestead，使用 Homestead Vagrant Box 可以极其方便的在统一的 Unix 环境下进行开发和测试，在 Homestead 的环境下，所有的组件都已经可用，其虚拟机环境中，已包含如下软件和工具：

> - Ubuntu 16.04
> - Git
> - PHP 7.0
> - Nginx
> - MySQL
> - MariaDB
> - Sqlite3
> - Postgres
> - Composer
> - Node (With PM2, Bower, Grunt, and Gulp)
> - Redis
> - Memcached
> - Beanstalkd

无论前端还是后端，都需要基于一个完整的环境运行项目并调试，因此都需要使用 `Composer` 和 `NPM` 安装第三方包，需要注意的是，部分组件需要全局安装，如 `Gulp`。

### 后端部分

执行以下命令通过 composer 安装第三方包：

```
composer install
```

> Composer 安装在默认设置下会很缓慢，所以需要使用国内的镜像，以提升速度：[Composer 中国镜像](http://pkg.phpcomposer.com "Composer 中国镜像")

安装完毕后，需要拷贝一份 `.env.example` 文件，并重命名为 `.env` 文件，随后运行：

```
php artisan key:generate
```

用于生成加密使用的 Key。执行完上述过程，即可在 Homestead 环境下调试，不过想要在 Homestead 下调试，还需要做一个操作，用于准备构建 Homestead 配置文件，你需要执行 vendor 目录下的可执行文件，
对于 Windows ，可在项目根目录下执行命令：

```
.\vendor\bin\homestead make
```

对于 Linux/Unix 系统，则执行以下命令：

```
./vendor/bin/homestead make
```

你就会在项目根目录下看见 `Homestead.yaml` 文件，该文件就是配置 Homestead 的文件。

### 前端部分

执行以下命令，通过 NPM 安装第三方包：

```
npm install
```

若是在 Homestead 环境下，所有的全局工具已经可用，对于未在 Homestead 环境下的，需要全局安装 `Gulp`，执行如下命令进行：

```
npm install --global gulp
```

> NPM 安装速度相对很慢，可通过该办法提高速度：[《优化 NPM 安装 Gulp 和 Laravel Elixir 的下载速度》](http://phphub.laravel-china.org/topics/2102 "优化 NPM 安装 Gulp 和 Laravel Elixir 的下载速度")

准备就绪后，即可利用基于 `Gulp` 的 `Elixr` 开始执行相关任务。所有的任务都定义在项目根目录下的 `gulpfile.js` 之中。执行如下命令以执行任务：

```
// 运行所有任务...
gulp

// 运行所有任务并压缩所有 CSS 及 JavaScript...
gulp --production
```

因为每次修改你的资源文件之后在命令行运行 gulp 命令会相当不便，因此你可以使用 gulp watch 命令。此命令会在你的命令行运行并监控资源文件的任何修改。当发生修改时，新文件将会自动被编译：

```
gulp watch
```

## 工作目录以及注意事项

整个项目结构中，有三个目录是开发主要工作所在的地点，分别是 `app` 、 `pitaya` 和 `resource`。前两个是后端开发主要所在，前者是应用部分的代码，后者是基础组件和接口，以及交互控制器。resource 则是前端工作目录，其中包含 `assets`、`lang`、`views`，第一个是代码和资源文件，包括 JS、LESS 和 SASS 之类。第二个是语言包，用于前台展示使用，不过需要注意，该目录后端也可能会参与。最后则是视图文件，对于常规的模板渲染，都是在这里定义模板和视图文件。

工作目录除上述，还可能随着项目开发进展存在或多或少的变动和调整，调整同时也会修订本文，保证本文的可参考性。

**`在此提出一个注意事项：`** 由于项目最终会部署的服务器不确定，为保证兼容性，务必时刻注意文件名的大小写以及文件内容编码的问题，务必保证所有开发人员所创建的资源和代码文件编码为 `UTF-8`。


