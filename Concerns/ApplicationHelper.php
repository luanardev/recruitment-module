<?php
namespace Luanardev\Modules\Recruitment\Concerns;

trait ApplicationHelper
{
    public function isReceived()
    {
        return (strtolower($this->status) == strtolower('received') )? true:false;
    }

    public function isShortlisted()
    {
        return (strtolower($this->status) == strtolower('shortlisted') )? true:false;
    }

    public function isAppointed()
    {
        return (strtolower($this->status) == strtolower('appointed') )? true:false;
    }

    public function isReviewed()
    {
        return (strtolower($this->status) == strtolower('reviewed') )? true:false;
    }

    public function statusBadge()
    {
        return "<span class='badge badge-success'>{$this->status}</span>";
    }
}