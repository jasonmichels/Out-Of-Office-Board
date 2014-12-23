<?php namespace OutOfOffice\User\Listeners;

use OutOfOffice\User\Contracts\UserAccountWasConfirmedEvent;
use Laracasts\Commander\Events\EventListener;
use Illuminate\Support\Facades\Mail;

/**
 * Send notifications after an account has been confirmed
 *
 * Class AccountConfirmationNotifier
 *
 * @package OutOfOffice\User\Listeners
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class AccountConfirmationNotifier extends EventListener
{
    /**
     * Send a notification after an account has been confirmed
     *
     * @param UserAccountWasConfirmedEvent $userWasCreated
     */
    public function whenUserAccountWasConfirmedEvent(UserAccountWasConfirmedEvent $userAccountWasConfirmedEvent)
    {
        $user = $userAccountWasConfirmedEvent->getUser();

        Mail::send('user::emails.confirmed', ['user' => $user], function($message) use ($user) {

            $message->to($user->email, $user->name)
                ->subject('Out Of Office - Welcome');

        });
    }
}
