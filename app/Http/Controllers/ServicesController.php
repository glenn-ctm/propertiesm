<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /* Construction */
    public function plumbing()
    {
        return view('site.pages.services.plumbing');
    }

    public function electrical()
    {
        return view('site.pages.services.electrical');
    }

    public function carpentry()
    {
        return view('site.pages.services.carpentry');
    }

    public function dryWall()
    {
        return view('site.pages.services.dry-wall');
    }

    public function painting()
    {
        return view('site.pages.services.painting');
    }

    public function doors()
    {
        return view('site.pages.services.doors');
    }

    public function windows()
    {
        return view('site.pages.services.windows');
    }

    public function ceiling()
    {
        return view('site.pages.services.ceiling');
    }

    public function flooring()
    {
        return view('site.pages.services.flooring');
    }

    public function carpetCleaning()
    {
        return view('site.pages.services.carpet-cleaning');
    }

    public function applianceRepairsNewInstallation()
    {
        return view('site.pages.services.appliance-repairs-new-installation');
    }

    public function roofing()
    {
        return view('site.pages.services.roofing');
    }

    public function exteriorStructure()
    {
        return view('site.pages.services.exterior-structure');
    }

    public function newBuilds()
    {
        return view('site.pages.services.new-builds');
    }

    public function addOns()
    {
        return view('site.pages.services.add-ons');
    }

    public function jadus()
    {
        return view('site.pages.services.jadus');
    }

    public function adus()
    {
        return view('site.pages.services.adus');
    }

    public function hardScaping()
    {
        return view('site.pages.services.hardscaping');
    }

    public function softScaping()
    {
        return view('site.pages.services.softscaping');
    }

    /* Landscaping */
    public function gardening()
    {
        return view('site.pages.services.gardening');
    }

    public function springklerSystems()
    {
        return view('site.pages.services.springkler-systems');
    }

    public function treeTrimmingRemovalInstallation()
    {
        return view('site.pages.services.tree-trimming-removal-installation');
    }

    public function retainingWalls()
    {
        return view('site.pages.services.retaining-walls');
    }

    public function fencing()
    {
        return view('site.pages.services.fencing');
    }

    public function concrete()
    {
        return view('site.pages.services.concrete');
    }

    /* Management Services */
    public function rentCollection()
    {
        return view('site.pages.services.rent-collection');
    }

    public function tenantOccupancy()
    {
        return view('site.pages.services.tenant-occupancy');
    }

    public function evictions()
    {
        return view('site.pages.services.evictions');
    }

    public function monthlyStatements()
    {
        return view('site.pages.services.monthly-statements');
    }

    public function propertyInspections()
    {
        return view('site.pages.services.property-inspections');
    }

    public function projectManagement()
    {
        return view('site.pages.services.project-management');
    }

    public function propertyManagement()
    {
        return view('site.pages.services.property-management');
    }

    public function fullPropertyMaintenance()
    {
        return view('site.pages.services.full-property-maintenance');
    }

    public function reporting()
    {
        return view('site.pages.services.reporting');
    }

    public function appAccessMonitoring()
    {
        return view('site.pages.services.app-access-monitoring');
    }

    /* Property Inspection */
    public function locks()
    {
        return view('site.pages.services.locks');
    }

    public function seals()
    {
        return view('site.pages.services.seals');
    }

    public function leaks()
    {
        return view('site.pages.services.leaks');
    }

    public function smokeDetector()
    {
        return view('site.pages.services.smoke-detector');
    }

    public function extermination()
    {
        return view('site.pages.services.extermination');
    }

    public function siteCheck()
    {
        return view('site.pages.services.site-check');
    }

    public function mold()
    {
        return view('site.pages.services.mold');
    }

    public function lead()
    {
        return view('site.pages.services.lead');
    }

    public function remediation()
    {
        return view('site.pages.services.remediation');
    }

}
