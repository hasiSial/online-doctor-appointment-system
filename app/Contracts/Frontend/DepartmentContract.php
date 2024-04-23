<?php

namespace App\Contracts\Frontend;

/**
 * @var DepartmentContract
 */
interface DepartmentContract
{
    public function cardiology();
    public function eyeCare();
    public function Pulmonary();
    public function dentalCare();
    public function diagnostics();
    public function disabled();
    public function traumotoligy();
    public function neurology();

}
