<?php
namespace Luanardev\Modules\Recruitment\Concerns;

trait VacancyHelper
{
    public function isOpen()
    {
        return (strtolower($this->status) == strtolower('open') )? true:false;
    }

    public function isClosed()
    {
        return (strtolower($this->status) == strtolower('closed') )? true:false;
    }

    public function isPublished()
    {
        return (strtolower($this->published) == strtolower('yes') )? true:false;
    }

    public function isNotPublished()
    {
        return (strtolower($this->published) == strtolower('no') )? true:false;
    }

    public function isApplicable()
    {
        return (strtolower($this->applicable) == strtolower('yes') )? true:false;
    }

    public function isNotApplicable()
    {
        return (strtolower($this->applicable) == strtolower('no') )? true:false;
    }

    public function isExternal()
    {
        return (strtolower($this->audience) == strtolower('external') )? true:false;
    }

    public function isInternal()
    {
        return (strtolower($this->audience) == strtolower('internal') )? true:false;
    }
    
    public function closingDate()
    {
        return (isset($this->close_date))? $this->close_date->format('d-M-Y'):null;
    }

    public function statusBadge()
    {
        return $this->isOpen()?
            "<span class='badge badge-success'>{$this->status}</span>":
            "<span class='badge badge-danger'>{$this->status}</span>";
    }

    public function applicableBadge()
    {
        return $this->isApplicable()?
            "<span class='badge badge-success'>{$this->applicable}</span>":
            "<span class='badge badge-danger'>{$this->applicable}</span>";
    }

    public function publishBadge()
    {
        return $this->isPublished()?
            "<span class='badge badge-success'>{$this->published}</span>":
            "<span class='badge badge-danger'>{$this->published}</span>";
    }
}