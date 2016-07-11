<?php
/**
 * BootstrapPaginationPresenter.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/09 18:42
 */

namespace ActLoudBur\PowerManagement\Frame;

use Illuminate\Support\HtmlString;
use Illuminate\Pagination\BootstrapThreePresenter;

/**
 * Class BootstrapPaginationPresenter
 * 
 * 自定义分页样式
 *
 * @package ActLoudBur\PowerManagement\Frame
 */
class BootstrapPaginationPresenter extends BootstrapThreePresenter
{
    /**
     * Convert the URL window into Bootstrap HTML.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function render()
    {
        if ($this->hasPages()) {
            return new HtmlString(sprintf(
                '<ul class="pagination  pagination-sm no-margin pull-right">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            ));
        }

        return '';
    }

}