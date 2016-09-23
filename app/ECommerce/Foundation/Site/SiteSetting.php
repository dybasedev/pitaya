<?php
/**
 * SiteSetting.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/23 10:48
 */

namespace PitayaApplication\ECommerce\Foundation\Site;

use Illuminate\Contracts\Filesystem\Filesystem;

/**
 * Class SiteSetting
 *
 * 站点设置
 *
 * @package PitayaApplication\ECommerce\Foundation\Site
 */
class SiteSetting
{
    /**
     * @var array
     */
    protected $settings;

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var bool
     */
    protected $destroy = false;

    /**
     * SiteSetting constructor.
     *
     * @param string     $path       设置文件的路径
     * @param Filesystem $filesystem 文件系统
     */
    public function __construct($path, Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;

        if (!$this->filesystem->exists($path)) {
            $this->filesystem->put($path, serialize([]));
        }

        $this->settings = unserialize($filesystem->get($this->path = $path));
    }

    /**
     * is utilized for reading data from inaccessible members.
     *
     * @param $name string
     *
     * @return mixed
     * @link http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members
     */
    public function __get($name)
    {
        return $this->settings[$name];
    }

    /**
     * run when writing data to inaccessible members.
     *
     * @param $name  string
     * @param $value mixed
     *
     * @return void
     * @link http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members
     */
    public function __set($name, $value)
    {
        $this->settings[$name] = $value;
    }

    /**
     * is triggered by calling isset() or empty() on inaccessible members.
     *
     * @param $name string
     *
     * @return bool
     * @link http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members
     */
    public function __isset($name)
    {
        return isset($this->settings[$name]);
    }

    /**
     * is invoked when unset() is used on inaccessible members.
     *
     * @param $name string
     *
     * @return void
     * @link http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members
     */
    public function __unset($name)
    {
        unset($this->settings[$name]);
    }

    /**
     * 判断是否存在设置项
     *
     * @param $name
     *
     * @return bool
     */
    public function has($name)
    {
        return isset($this->{$name});
    }

    /**
     * 设置设置项
     *
     * @param string|array $name
     * @param null|mixed   $value
     *
     * @return $this
     */
    public function set($name, $value = null)
    {
        if (is_array($name)) {
            $this->settings = $name;

            return $this;
        }

        $this->settings[$name] = $value;

        return $this;
    }

    /**
     * 清空设置项
     */
    public function destroy()
    {
        $this->settings = [];
        $this->filesystem->delete($this->path);
        $this->destroy = true;
    }

    /**
     * 保存设置
     */
    public function save()
    {
        $this->filesystem->put($this->path, serialize($this->settings));
    }

    /**
     * 析构函数
     */
    public function __destruct()
    {
        if (!$this->destroy) {
            $this->save();
        }
    }
}