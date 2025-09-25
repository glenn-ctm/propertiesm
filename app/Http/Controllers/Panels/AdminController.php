<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /* Dashboard */
    public function dashboard()
    {
        return view('templates.panel.admin.dashboard');
    }

    /* My Account */
    public function myAccountView()
    {
        return view('templates.panel.admin.my-account.view');
    }

    public function myAccountEdit()
    {
        return view('templates.panel.admin.my-account.edit');
    }

    /* Payment */
    public function paymentShow()
    {
        return view('templates.panel.admin.payment.show');
    }

    /* Property Listing */
    public function propertyListingShow()
    {
        return view('templates.panel.admin.property-listing.show');
    }

    public function propertyListingView()
    {
        return view('templates.panel.admin.property-listing.view');
    }

    public function propertyListingEdit()
    {
        return view('templates.panel.admin.property-listing.edit');
    }

    public function propertyListingAdd()
    {
        return view('templates.panel.admin.property-listing.add');
    }

    /* Requests */
    public function requestsShow()
    {
        return view('templates.panel.admin.requests.show');
    }

    public function requestsEditOneTimeUser()
    {
        return view('templates.panel.admin.requests.edit-one-time-user');
    }

    public function requestsEditPropertyOwner()
    {
        return view('templates.panel.admin.requests.edit-property-owner');
    }

    public function requestsEditTenant()
    {
        return view('templates.panel.admin.requests.edit-tenant');
    }

    public function requestsViewOneTimeUser()
    {
        return view('templates.panel.admin.requests.view-one-time-user');
    }

    public function requestsViewPropertyOwner()
    {
        return view('templates.panel.admin.requests.view-property-owner');
    }

    public function requestsViewTenant()
    {
        return view('templates.panel.admin.requests.view-tenant');
    }


    /* Progress Sheet */
    public function progressSheetCreate()
    {
        return view('templates.panel.admin.progress-sheet.create');
    }

    public function progressSheetShow()
    {
        return view('templates.panel.admin.progress-sheet.show');
    }

    public function progressSheetView()
    {
        return view('templates.panel.admin.progress-sheet.view');
    }

    public function progressSheetEdit()
    {
        return view('templates.panel.admin.progress-sheet.edit');
    }

    public function progressSheetDuplicate()
    {
        return view('templates.panel.admin.progress-sheet.duplicate');
    }

    /* Vid-Rec-Pic */
    public function vidRecPicShow()
    {
        return view('templates.panel.admin.vid-rec-pic.show');
    }

    public function vidRecPicEdit()
    {
        return view('templates.panel.admin.vid-rec-pic.edit');
    }

    public function vidRecPicUpload()
    {
        return view('templates.panel.admin.vid-rec-pic.upload');
    }

    /* Properties */
    public function propertiesEdit()
    {
        return view('templates.panel.admin.properties.edit');
    }

    public function propertiesAdd()
    {
        return view('templates.panel.admin.properties.add');
    }

    public function propertiesShow()
    {
        return view('templates.panel.admin.properties.show');
    }

    public function propertiesView()
    {
        return view('templates.panel.admin.properties.view');
    }

    /* Users */
    public function usersEdit()
    {
        return view('templates.panel.admin.users.edit');
    }

    public function users()
    {
        return view('templates.panel.admin.users.index');
    }

    public function usersShow()
    {
        return view('templates.panel.admin.users.show');
    }

    /* User Management - Admin */
    public function UserManagementAdminShow()
    {
        return view('templates.panel.admin.user-management.admin.show');
    }

    public function UserManagementAdminEdit()
    {
        return view('templates.panel.admin.user-management.admin.edit');
    }

    public function UserManagementAdminAdd()
    {
        return view('templates.panel.admin.user-management.admin.add');
    }

    public function UserManagementAdminView()
    {
        return view('templates.panel.admin.user-management.admin.view');
    }

    /* User Management - One Time User */
    public function UserManagementOneTimeUserShow()
    {
        return view('templates.panel.admin.user-management.one-time-user.show');
    }

    public function UserManagementOneTimeUserEdit()
    {
        return view('templates.panel.admin.user-management.one-time-user.edit');
    }

    public function UserManagementOneTimeUserView()
    {
        return view('templates.panel.admin.user-management.one-time-user.view');
    }

    public function UserManagementOneTimeUserRequestHistory()
    {
        return view('templates.panel.admin.user-management.one-time-user.per-property.request-history');
    }

    public function UserManagementOneTimeUserPaymentHistory()
    {
        return view('templates.panel.admin.user-management.one-time-user.per-property.payment-history');
    }

    /* User Management - Property Owner  */
    public function UserManagementPropertyOwnerShow()
    {
        return view('templates.panel.admin.user-management.property-owner.show');
    }

    public function UserManagementPropertyOwnerEdit()
    {
        return view('templates.panel.admin.user-management.property-owner.edit');
    }

    public function UserManagementPropertyOwnerView()
    {
        return view('templates.panel.admin.user-management.property-owner.view');
    }

    /* User Management - Tenant  */
    public function UserManagementTenantShow()
    {
        return view('templates.panel.admin.user-management.tenant.show');
    }

    public function UserManagementTenantPerPropertyShow()
    {
        return view('templates.panel.admin.user-management.tenant.per-property.show');
    }

    public function UserManagementTenantPerPropertyView()
    {
        return view('templates.panel.admin.user-management.tenant.per-property.view');
    }

    public function UserManagementTenantPerPropertyEdit()
    {
        return view('templates.panel.admin.user-management.tenant.per-property.edit');
    }

    public function UserManagementTenantRequestHistory()
    {
        return view('templates.panel.admin.user-management.tenant.per-property.request-history');
    }

    public function UserManagementTenantPaymentHistory()
    {
        return view('templates.panel.admin.user-management.tenant.per-property.payment-history');
    }


}
