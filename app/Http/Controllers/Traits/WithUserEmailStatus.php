<?php

namespace App\Http\Controllers\Traits;

use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\UserStatus;

trait WithUserEmailStatus
{

    public function manageEmailStatus(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $email_status = $request->input('email_status', UserStatus::UNVERIFY);
        $this->setEmailStatus($user, $email_status);
        switch ($email_status) {
            case UserStatus::VERIFY:
                $message = "verified";
                break;
            
            default:
                $message = "unverified";
                break;
        }
        session()->flash('alertSuccess', "User successfully $message.");
        return redirect()->back();
    }

    public function setEmailStatus(User $user, $status)
    {
        if( $this->emailStatusIsDirty($user, $status) ){
            if( $status === UserStatus::VERIFY ) {
                $user->markEmailAsVerified();
            } else {
                $user->forceFill([
                    'email_verified_at' => null,
                ])->save();
            }
        }
        
    }

    public function emailStatusIsDirty(User $user, $status)
    {
        $currentStatus = $user->hasVerifiedEmail() ? UserStatus::VERIFY : UserStatus::UNVERIFY;
        return $currentStatus !== $status;
    }
}
