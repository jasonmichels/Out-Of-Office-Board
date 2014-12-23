<?php namespace OutOfOffice\User\Listeners;

use OutOfOffice\User\Contracts\UserWasCreatedEvent;
use Laracasts\Commander\Events\EventListener;
use Illuminate\Support\Facades\Mail;

/**
 * Send email confirmation when user is created
 *
 * Class EmailConfirmation
 *
 * @package OutOfOffice\User\Listeners
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class EmailConfirmation extends EventListener
{
    /**
     * Send an email confirmation to a user after they were created
     *
     * @param UserWasCreatedEvent $userWasCreated
     */
    public function whenUserWasCreatedEvent(UserWasCreatedEvent $userWasCreated)
    {
        $user = $userWasCreated->getUser();

        Mail::send('user::emails.confirmation', ['user' => $user], function($message) use ($user) {

            $message->to($user->email, $user->name)
                ->subject('Out Of Office - Verify your email address');

        });
    }
}
